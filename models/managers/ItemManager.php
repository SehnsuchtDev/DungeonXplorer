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
        }else if(isset($res['it_manacost'],$res['it_effectname'],$res['it_effectvalue']))
            $item = new Parchmant();
        elseif ($res['it_handitem'] == 1) {
            if(isset($res['it_damage']))
                $item = new Weapon();
            elseif(isset($res['it_protectvalue']))
                $item = new Shield();
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

    public function modifyItem($id, $name, $description, $poids, $nbMax, $equipable, $armure, $nomEffet, $valEffet, $coutMana, $valProtection, $nbDegat){
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("UPDATE Items set
        it_name = :itemName, 
        it_description = :itemDesc,
        it_weight = :itemWeight,
        it_maxstack = :itemMaxStack,
        it_handitem = :itemHandItem,
        it_armor = :itemArmor,
        it_effectname = :itemEffectName,
        it_effectvalue = :itemEffectValue,
        it_manacost = :itemManaCost,
        it_protectvalue = :itemProtectValue,
        it_damage = :itemDamage
        where it_id = :item_id");

        $stmt->bindParam(':itemName',$name);
        $stmt->bindParam(':itemDesc',$description);
        $stmt->bindParam(':itemWeight',$poids);
        $stmt->bindParam(':itemMaxStack',$nbMax);
        $stmt->bindParam(':itemHandItem',$equipable);
        $stmt->bindParam(':itemArmor',$armure);
        $stmt->bindParam(':itemEffectName',$nomEffet);
        $stmt->bindParam(':itemEffectValue',$valEffet);
        $stmt->bindParam(':itemManaCost',$coutMana);
        $stmt->bindParam(':itemProtectValue',$valProtection);
        $stmt->bindParam(':itemDamage',$nbDegat);

        $stmt->bindParam(':item_id',$id);
        
        $stmt->execute();
    }

    public function addItem($name, $description, $poids, $nbMax, $equipable, $armure, $nomEffet, $valEffet, $coutMana, $valProtection, $nbDegat, $image){
        $bdd = \Dbconnection::getConnection();
    
        $stmt = $bdd->prepare("INSERT INTO Items(it_name, it_description,it_weight, it_maxstack, 
        it_handitem, it_armor, it_effectname, it_effectvalue, it_manacost, it_protectvalue, it_damage, it_image) VALUES
        (:itemName, :itemDesc, :itemWeight, :itemMaxStack, :itemHandItem, :itemArmor, :itemEffectName,
        :itemEffectValue, :itemManaCost, :itemProtectValue, :itemDamage, :itemImage)");

        $stmt->bindParam(':itemName',$name);
        $stmt->bindParam(':itemDesc',$description);
        $stmt->bindParam(':itemWeight',$poids);
        $stmt->bindParam(':itemMaxStack',$nbMax);
        $stmt->bindParam(':itemHandItem',$equipable);
        $stmt->bindParam(':itemArmor',$armure);
        $stmt->bindParam(':itemEffectName',$nomEffet);
        $stmt->bindParam(':itemEffectValue',$valEffet);
        $stmt->bindParam(':itemManaCost',$coutMana);
        $stmt->bindParam(':itemProtectValue',$valProtection);
        $stmt->bindParam(':itemDamage',$nbDegat);
        $stmt->bindParam(':itemImage',$image);
        
        $stmt->execute();
    }

}