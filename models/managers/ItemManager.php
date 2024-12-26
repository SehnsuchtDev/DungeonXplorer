<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\item\Armor;
use dungeonxplorer\item\class\ClassItem;
use dungeonxplorer\item\class\MagicWand;
use dungeonxplorer\item\class\Parchmant;
use dungeonxplorer\item\class\Weapon;
use dungeonxplorer\item\Item;
use dungeonxplorer\item\potion\Effect;
use dungeonxplorer\item\potion\Potion;
use dungeonxplorer\item\Shield;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';

class ItemManager{
    private static self $instance;

    private function __construct(){}

    public static function getInstance() : self {
        if(!isset(self::$instance))
            self::$instance = new self();
        return self::$instance;
    }

    public function getItem(int $itemId) : ?Item {
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT * FROM Items WHERE it_id = ?");
        $stmt->execute([$itemId]);

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $res = $stmt->fetch();


        if($res['it_armor'] == 1){
            $item = new Armor();
        }elseif ($res['it_handitem'] == 1) {
            if(isset($res['it_damage']))
                $item = new Weapon();
            elseif(isset($res['it_protectvalue']))
                $item = new Shield();
            elseif(isset($res['it_manacost'],$res['it_effectname'],$res['it_effectvalue']))
                $item = new Parchmant();
            elseif(isset($res['it_manacost']))
                $item = new MagicWand();
        }elseif(isset($res['it_effectname'])){
            $item = new Potion();
        }else{
            $item = new Item();
        }

        $item->hydrate($res);


        return $item;
    }

}