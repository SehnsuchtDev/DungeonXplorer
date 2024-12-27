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

}



