<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\managers\HeroManager;
use dungeonxplorer\account\User;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'autoload.php';

class AdminManager{

    private static self $instance;

    private function __construct(){}

    public static function getInstance() : self {
        if(!isset(self::$instance))
            self::$instance = new self();
        return self::$instance;
    }

    public function deleteAccount($userID){
        // Now we can delete the account
        User::getUserById($userID)->delete();
        
        /*// There is already a function that does it
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("DELETE FROM User where us_id = :idOfOurUser");
        $stmt->bindParam(":idOfOurUser",$userID);
        $stmt->execute();
        */
    }

    public function modifyAccount($userID, $newEMail, $newPseudo){
        $user = User::getUserById($userID);
        
        $user->updateUsername($newPseudo);
        $user->updateMailAddress($newEMail);
    }

    public function modifyPasswordAccount($userID, $password){
        $user = User::getUserById($userID);

        $user->updatePassword($password);
    }

    public function deleteAdventure($userID){
        $user = User::getUserById($userID);

        $hero = $user->getHero();
        HeroManager::getInstance()->reset($hero);
    }

    public function deleteCharacter($userID){
        $user = User::getUserById($userID);

        HeroManager::getInstance()->deleteHero($userID);
    }

    public function getAllUserInformation(){
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("select us_id, us_username, us_email, he_id from User");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllLevelInformation(){
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("select le_id,cl_id,le_level,le_required_xp,le_pv_bonus,le_mana_bonus,le_strength_bonus,le_initiative_bonus from Level"); ///
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function updateLevel($id,$numero,$xp,$pvBonus,$mana,$force,$initiative){
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("update Level set le_level=$numero,le_required_xp=$xp,le_pv_bonus=$pvBonus,le_mana_bonus=$mana,le_strength_bonus=$force,le_initiative_bonus=$initiative where le_id=$id");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function deleteLevel($id){
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("delete from Level where le_id=$id");
        $stmt->execute();
    }

}



