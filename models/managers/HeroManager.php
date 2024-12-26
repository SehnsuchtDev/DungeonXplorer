<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\item\HandItem;
use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\magic\Wizard;
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\loot\Loot;
use dungeonxplorer\hero\class\magic\Spell;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\managers\ItemManager;
use dungeonxplorer\item\Inventory;

use dungeonxplorer\item\Item;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'autoload.php';

class HeroManager{
    private static self $instance;

    private function __construct(){}

    public static function getInstance() : self {
        if(!isset(self::$instance))
            self::$instance = new self();
        return self::$instance;
    }

    public function getHero(int $heroId) : ?Hero {
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT * FROM Hero WHERE he_id = ?;");
        $stmt->execute([$heroId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        $res = $stmt->fetch();

        if(isset($res['cl_id']))
            switch ($res['cl_id']) {
                case 1:
                    $hero = new Warrior();
                    break;
                case 2:
                    $hero = new Wizard();
                    break;
                case 3:
                    $hero = new Thief();
                    break;
            }

        $hero->hydrate($res);
        InventoryManager::getInstance()->getInventoryWithHeroId($hero);

        return $hero;
    }

    public function createHero($heroName, $biography, $class){
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("INSERT INTO Hero(he_name, cl_id, he_biography, he_pv, he_mana, he_strength, he_initiative, he_armor, he_primary_weapon, 
        he_secondary_weapon, he_xp, he_current_level, he_purse, ch_id) VALUES(:nameOfMyHero, :classOfMyHero, :biographyOfMyHero,
        (select cl_base_pv from Class where cl_id = :classOfMyHero), (select cl_base_mana from Class where cl_id = :classOfMyHero), 
        (select cl_strength from Class where cl_id = :classOfMyHero), (select cl_initiative from Class where cl_id = :classOfMyHero),
        null, (select cl_primary_weapon from Class where cl_id = :classOfMyHero), null, 0, 1, 0, 1)");

        $stmt->bindParam(':nameOfMyHero',$heroName);

        $stmt->bindParam(':biographyOfMyHero',$biography);
        $stmt->bindParam(':classOfMyHero', $class);

        $stmt->execute();
        $idOfTheHero = intval($bdd->lastInsertId());

        $result = $stmt->fetch(\PDO::FETCH_OBJ);        //result of the query

        $classData = $bdd->prepare("select cl_id, cl_name, cl_base_pv, cl_base_mana, cl_strength, cl_initiative, cl_primary_weapon
        from Class where cl_id = :classOfMyHero");
        $classData->bindParam(":classOfMyHero", $class);

        $classData->execute();
        $classInformation = $classData->fetch(\PDO::FETCH_OBJ);

        $hero;
        $itemManager = ItemManager::getInstance();

        if($class === "1"){
            $hero = new Warrior();
            $hero->setArmor(null);
        }else{
            if($class === "2"){
                $hero = new Wizard();
            }elseif($class === "3"){
                $hero = new Thief();
            }
        }

        $hero->setId($idOfTheHero);
        $hero->setName($heroName);
        $hero->setClassHero($class);
        //$hero->setImage($heroImage);
        $hero->setBiography($biography);

        $hero->setPv($classInformation->cl_base_pv);
        $hero->setStrength($classInformation->cl_strength);
        $hero->setInitiative($classInformation->cl_initiative);

        $idOfThePrimaryWeapon = $classInformation->cl_primary_weapon;
        $item = $itemManager->getItem($idOfThePrimaryWeapon);
        $hero->setPrimaryWeapon($item);

        $hero->setSecondaryWeapon(null);

        $hero->setXp(0);
        $hero->setCurrentLevel(1);

        $chapterManager = ChapterManager::getInstance();
        $chapter = $chapterManager->getChapter(1);
        $hero->setCurrentChapter($chapter);
        $hero->setPurse(0);

        return $hero;
    }

    public function reset(Hero $hero){
        // First we retrieve the informations
        // that will still be the same :
        // name, biography and class stay !!

        /*// Don't need this informations
        $biographyOfMyHero = $hero->getBiography();
        $nameOfMyHero = $hero->getName();
        */
        $classOfMyHero = $hero->getClassHero();
        $idOfMyHero = $hero->getId();


        // Then we reset the information of our hero in the database
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("UPDATE Hero   
        set he_pv = (select cl_base_pv from Class where cl_id = :classOfMyHero),
        he_mana = (select cl_base_mana from Class where cl_id = :classOfMyHero),
        he_strength = (select cl_strength from Class where cl_id = :classOfMyHero), 
        he_initiative = (select cl_initiative from Class where cl_id = :classOfMyHero),
        he_armor = null, 
        he_primary_weapon = (select cl_primary_weapon from Class where cl_id = :classOfMyHero), 
        he_secondary_weapon = null, 
        he_xp = 0,
        he_current_level = 1, 
        he_purse = 0, 
        ch_id = 1 
        where he_id = :idOfMyHero
        ");
        $stmt->bindParam(':classOfMyHero', $classOfMyHero);
        $stmt->bindParam(':idOfMyHero', $idOfMyHero);
        $stmt->execute();

        // We also have to delete all the information related to the hero
        // like the inventory and the spell

        //We begin with the spell information
        $stmt2 = $bdd->prepare("DELETE FROM HeroSpell
        where he_id = :idOfMyHero
        ");
        $stmt2->bindParam(':idOfMyHero', $idOfMyHero);
        $stmt2->execute();

        //Then with inventory information
        $stmt3 = $bdd->prepare("DELETE FROM Inventory
        where he_id = :idOfMyHero
        ");
        $stmt3->bindParam(':idOfMyHero', $idOfMyHero);
        $stmt3->execute();


        // Now we reset our hero as an object  
        $classData = $bdd->prepare("select cl_id, cl_name, cl_base_pv, cl_base_mana, cl_strength, cl_initiative, cl_primary_weapon
        from Class where cl_id = :classOfMyHero");
        $classData->bindParam(":classOfMyHero", $classOfMyHero);

        $classData->execute();
        $classInformation = $classData->fetch(\PDO::FETCH_OBJ);
        $itemManager = ItemManager::getInstance();

        /*We don't have to change this information
        $hero->setId($idOfTheHero);
        $hero->setName($heroName);
        $hero->setClassHero($class);
        $hero->setBiography($biography);
        */
        //$hero->setImage($heroImage);
        $hero->setPv($classInformation->cl_base_pv);
        $hero->setStrength($classInformation->cl_strength);
        $hero->setInitiative($classInformation->cl_initiative);

        $idOfThePrimaryWeapon = $classInformation->cl_primary_weapon;
        $item = $itemManager->getItem($idOfThePrimaryWeapon);
        $hero->setPrimaryWeapon($item);

        $hero->setSecondaryWeapon(null);

        $hero->setXp(0);
        $hero->setCurrentLevel(1);

        $chapterManager = ChapterManager::getInstance();
        $chapter = $chapterManager->getChapter(1);
        $hero->setCurrentChapter($chapter);
        $hero->setPurse(0);


    }

    public function save($hero){

        $bdd = \Dbconnection::getConnection();

        // First we update the hero information
        $stmt = $bdd->prepare("UPDATE Hero   
        set he_name = :nameOfMyHero,
        he_pv = :pvOfOurHero,
        he_mana = :manaOfOurHero,
        he_strength = :strengthOfOurHero, 
        he_initiative = :initiativeOfOurHero,
        he_armor = :armorOfOurHero, 
        he_primary_weapon = :primaryWeaponOfOurHero, 
        he_secondary_weapon = :secondaryWeaponOfOurHero, 
        he_xp = :xpOfOurHero,
        he_current_level = :currentLevelOfOurHero, 
        he_purse = :purseOfOurHero, 
        ch_id = :chapterOfOurHero 
        where he_id = :idOfMyHero
        ");

        $id = $hero->getId();

        $name = $hero->getName();
        $pv = $hero->getPv();
        $mana = $hero->getMana();
        $strength = $hero->getStrength();
        $initiative = $hero->getInitiative();
        $primaryWeapon = $hero->getPrimaryWeapon()->getId();
        $secondaryWeapon = $hero->getSecondaryWeapon()?->getId();
        $xp = $hero->getXp();
        $currentLevel = $hero->getCurrentLevel();
        $purse =  $hero->getPurse();
        $chapter = $hero->getCurrentChapter()->getId();

        $stmt->bindParam(":idOfMyHero", $id);

        $stmt->bindParam(":nameOfMyHero", $name);
        $stmt->bindParam(":pvOfOurHero", $pv);
        $stmt->bindParam(":manaOfOurHero", $mana);
        $stmt->bindParam(":strengthOfOurHero", $strength); 
        $stmt->bindParam(":initiativeOfOurHero", $initiative); 
        $stmt->bindParam(":primaryWeaponOfOurHero", $primaryWeapon); 
        $stmt->bindParam(":secondaryWeaponOfOurHero", $secondaryWeapon); 
        $stmt->bindParam(":xpOfOurHero", $xp);
        $stmt->bindParam(":currentLevelOfOurHero", $currentLevel); 
        $stmt->bindParam(":purseOfOurHero", $purse); 
        $stmt->bindParam(":chapterOfOurHero", $chapter);
        
        // If he's a warrior
        $armor = null;
        if($hero->getClassHero() === 1){
            $armor = $hero->getArmor()->getId();
        }
        $stmt->bindParam(":armorOfOurHero", $armor);
        
        
        $stmt->execute();

        // Then we update the spell information if he's a wizzard 
        // First we update the hero information
        var_dump($hero->getSpells());
        if($hero->getSpells() !== null){
            
            // On supprime d'abord tout les spells puis on rajoute 
            // afin d'actualiser si il y a des nouveaux spells
            $spellRemovalRequest = $bdd->prepare("delete from HeroSpell  where he_id = :idOfMyHero");
            $spellRemovalRequest->bindParam(":idOfMyHero", $id);
            $spellRemovalRequest->execute();

            foreach($hero->getSpells() as $key){
                echo '<pre>';
                echo "the key , " . $key->getName();
                echo '</pre></br>';
                $spellsRequest = null;
                $spellsRequest = $bdd->prepare("insert into HeroSpell(he_id, sp_id) VALUES (:idOfMyHero, (select sp_id from Spell where sp_name = :nameOfMySpell))");

                $spellName = $key->getName();
                $spellsRequest->bindParam(":idOfMyHero", $id);
                $spellsRequest->bindParam(":nameOfMySpell", $spellName);

                $spellsRequest->execute();
            }
        }
        
        
        $inventoryRemovalRequest = $bdd->prepare("delete from Inventory where he_id = :idOfMyHero");
        $inventoryRemovalRequest->bindParam(":idOfMyHero", $id);
        $inventoryRemovalRequest->execute();

        echo "------------------------------------------<br>";
        foreach($hero->getInventory()->getItems() as $key){
            echo '<pre>';
            var_dump($key);
            echo "the key name  : " . $key['item']->getName() . ", item id : " . $key['item']->getId() . ", quantité : " . $key['quantity'];
            echo '</pre></br>';
            
            $inventoryRequest = null;
            $inventoryRequest = $bdd->prepare("insert into Inventory(he_id, it_id, quantity) VALUES (:idOfMyHero, :idOfMyItem, :quantityOfMyItem)");

            $itemId = $key['item']->getId();
            $itemQuantity = $key['quantity'];

            $inventoryRequest->bindParam(":idOfMyHero", $id);
            $inventoryRequest->bindParam(":idOfMyItem", $itemId);
            $inventoryRequest->bindParam(":quantityOfMyItem", $itemQuantity);

            $inventoryRequest->execute();
            
        }
            

    }

}

$hero = HeroManager::getInstance()->getHero(74);
echo '<pre>';
    var_dump($hero);
echo '</pre></br>';

$inventory = new Inventory();
$item1 = ItemManager::getInstance()->getItem(5);
$item2 = ItemManager::getInstance()->getItem(6);

$inventory->addItem($item1, 3);
$inventory->addItem($item2, 10);

$hero->setInventory($inventory);
var_dump($hero->getInventory());

/*// test de save de spell
$spell = new Spell();
$spell->setName("Boule de Feu");

$spell2 = new Spell();
$spell2->setName("Caca en boîte");

$hero->addSpell($spell);
$hero->addSpell($spell2);

echo '<pre>';
    var_dump($hero);
echo '</pre></br>';
*/
HeroManager::getInstance()->save($hero);

/*
$hero = HeroManager::getInstance()->getHero(70);
echo '<pre>';
    var_dump($hero);
echo '</pre></br>';

$hero->setPV(40000);

echo '<pre>';
    var_dump($hero);
echo '</pre></br>';

HeroManager::getInstance()->reset($hero);

echo '<pre>';
    var_dump($hero);
echo '</pre></br>';
*/

