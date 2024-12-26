<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\hero\class\magic\MagicHero;
use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\magic\Wizard;
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\Inventory;

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

        $hero->setInventory(new Inventory());

        if($hero instanceof MagicHero)
            $hero->setMana($classInformation->cl_base_mana);

        switch (get_class($hero)) {
            case Warrior::class :
                $hero->setArmor(null);
                break;
            case Wizard::class :
                $hero->setSpells(array());
                break;
        }

    }

}