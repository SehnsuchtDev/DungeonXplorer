<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\magic\Wizard;
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\hero\Hero;

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

    public static function createHero($heroName, $biography, $class){
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("INSERT INTO Hero(he_name, cl_id, he_biography, he_pv, he_mana, he_strength, he_initiative, he_armor, he_primary_weapon, 
        he_secondary_weapon, he_xp, he_current_level, he_purse, ch_id) VALUES(:nameOfMyHero, :classOfMyHero, :biographyOfMyHero,
        (select cl_base_pv from Class where cl_id = :classOfMyHero), (select cl_base_mana from Class where cl_id = :classOfMyHero), 
        (select cl_strength from Class where cl_id = :classOfMyHero), (select cl_initiative from Class where cl_id = :classOfMyHero),
        null, (select cl_primary_weapon from Class where cl_id = :classOfMyHero), null, 0, 1, 0, 1)");
        /*
        insert into Hero(he_name, cl_id, he_biography, he_pv, he_mana, he_strength, he_initiative, he_armor, he_primary_weapon,
        he_secondary_weapon, he_xp, he_current_level, he_purse, ch_id) values("lala", 1, "lala",
        (select cl_base_pv from Class where cl_id = 1), (select cl_base_mana from Class where cl_id = 1),
        (select cl_strength from Class where cl_id = 1), (select cl_initiative from Class where cl_id = 1),
        null, (select cl_primary_weapon from Class where cl_id = 1), null, 0, 1, 0, 1);
        */

        $stmt->bindParam(':nameOfMyHero',$heroName);

        $stmt->bindParam(':biographyOfMyHero',$biography);
        $stmt->bindParam(':classOfMyHero', $class);

        $stmt->execute();
        $idOfTheHero = intval($bdd->lastInsertId());
        echo "id du héro : " . $idOfTheHero;


        $result = $stmt->fetch(\PDO::FETCH_OBJ);        //result of the query

        $classData = $bdd->prepare("select cl_id, cl_name, cl_base_pv, cl_base_mana, cl_strength, cl_initiative, cl_primary_weapon
        from Class where cl_id = :classOfMyHero");
        $classData->bindParam(":classOfMyHero", $class);

        $classData->execute();
        $classInformation = $classData->fetch(\PDO::FETCH_OBJ);

        /*
        echo "<h1>INFO</h1>";
        echo "id classe : " . $classInformation->cl_id;
        echo ", name classe : " . $classInformation->cl_name;
        echo ", pv de base classe : " . $classInformation->cl_base_pv;
        echo ", mana de base classe : " . $classInformation->cl_base_mana;
        echo ", force classe : " . $classInformation->cl_strength;
        echo ", initiative classe : " . $classInformation->cl_initiative;
        echo ", arme principal classe : " . $classInformation->cl_primary_weapon;
        */

        $hero;

        if($class === "1"){
            $hero = new Warrior();
            $hero->setArmor(0);
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
        $hero->setStrenght($classInformation->cl_strength);
        $hero->setInitiative($classInformation->cl_initiative);
        $hero->setPrimaryWeapon($classInformation->cl_primary_weapon);
        $hero->setSecondaryWeapon(null);
        $hero->setSpellList(null);
        $hero->setXp(0);
        $hero->setCurrentLevel(1);
        $hero->setCurrentChapter(1);
        $hero->setPurse(0);

        echo "id -> " . $hero->getId();

        return $hero;
    }

}