<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\hero\class\magic\Spell;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\Inventory;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'autoload.php';

class InventoryManager{
    private static self $instance;

    private function __construct(){}

    public static function getInstance() : self {
        if(!isset(self::$instance))
            self::$instance = new self();
        return self::$instance;
    }

    public function getInventoryWithHeroId(Hero $hero) : ?Inventory {
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT it_id,quantity FROM Inventory WHERE he_id = ?;");

        $stmt->execute([$hero->getId()]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        $inventory = new Inventory();

        while($res = $stmt->fetch()){
            $inventory->addItem(ItemManager::getInstance()->getItem($res['it_id']),$res['quantity']);
        }

        $hero->setInventory($inventory);
    }

}
