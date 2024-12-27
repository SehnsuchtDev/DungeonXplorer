<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\managers\HeroManager;

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

        // Allows you to delete a hero by account id 
        HeroManager::getInstance()->deleteHero($userID);

        // Now we can delete the account
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("DELETE FROM User where us_id = :idOfOurUser");
        $stmt->bindParam(":idOfOurUser",$userID);
        $stmt->execute();

    }



}



