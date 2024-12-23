<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\hero\class\magic\Wizzard;
use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\Warrior;

use dungeonxplorer\hero;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';

class HeroManager{

            
    public function retrieveAllInformation($userID){
        $bdd = \Dbconnection::getConnection();

        //Everything that is not an object has an alias 
        $stmt = $bdd->prepare("select 
        he_id, he_name as name, cl_id, he_image as image, he_biography as biography, he_pv as pv, he_mana,
        he_strength as strength, he_initiative as initiative, he_armor, he_primary_weapon, he_secondary_weapon, he_shield,
        he_spell_list, he_xp as xp, he_current_level as current_level, ch_id, he_purse as purse
        from Hero where he_id = (select he_id from User where us_id = :idOfTheUser)");
        $stmt->bindParam(":idOfTheUser", $userID);

        $stmt->execute();

        $idOfMyHeroClass = $this->retrieveClassOfTheHero($userID);
        $myHeroClass = null;

        //It's a warrior if it's 1
        if($idOfMyHeroClass === 1){
            $myHeroClass = Warrior::Class;
        //It's a mage if it's 2
        }elseif($idOfMyHeroClass === 2){
            $myHeroClass = Wizzard::Class;
        //It's a thief if it's 3
        }elseif($idOfMyHeroClass === 3){
            $myHeroClass = Thief::Class;
        }
        $stmt->setFetchMode(\PDO::FETCH_CLASS, $myHeroClass);


        return ($stmt->fetch());;
    }

    public function retrieveClassOfTheHero($userID) :int{
        $bdd = \Dbconnection::getConnection();
        $request = $bdd->prepare("select cl_id from Hero where he_id = (select he_id from User where us_id = :idOfTheUser)");
        $request->bindParam(":idOfTheUser", $userID);

        $request->execute();

        $result = $request->fetch(\PDO::FETCH_OBJ);
        return $result->cl_id;
    }

    /*
    public function hydrate(array $data){
        foreach($data as $key => $value){
            //On récupere le nom du setter correspondant à l'attribut
            $method = 'set'.ucfirst($key);

            // si le setter correspondant existe
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    */


}

?>