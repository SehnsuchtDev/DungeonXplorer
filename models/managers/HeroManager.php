<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\magic\Wizard;
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\loot\Loot;

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

}