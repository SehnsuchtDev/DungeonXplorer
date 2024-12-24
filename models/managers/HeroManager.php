<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\magic\Wizard;
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\loot\Loot;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'autoload.php';

class HeroManager
{
    private static self $instance;

    private function __construct(){}

    public static function getInstance() : self {
        if(!isset(self::$instance))
            self::$instance = new self();
        return self::$instance;
    }

    public static function createHero($heroName, $biography, $class) : void {
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("INSERT INTO Hero(he_name, cl_id, he_biography, he_pv, he_mana, he_strength, he_initiative, he_armor, he_primary_weapon, 
        he_secondary_weapon, he_xp, he_current_level, he_purse, ch_id) VALUES(:nameOfMyHero, :idOfMyUser, :biographyOfMyHero,
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

        $userId = $_SESSION['user']->getUserId();
        $stmt->bindParam(':idOfMyUser',$userId);

        $stmt->bindParam(':biographyOfMyHero',$biography);
        $stmt->bindParam(':classOfMyHero', $class);

        $stmt->execute();
        $stmt->fetch(\PDO::FETCH_OBJ);

        $hero;

        if($class === "1"){
            $hero = new Warrior();
            $hero->setArmor(0);
        }else{
            if($class === "2"){
                echo "c'est un mage !";
                $hero = new Wizzard();
            }elseif($class === "3"){
                echo "c'est un Voleur !";
                $hero = new Thief(); 
            }
            
        }

        
        
        return $hero;
    }


}