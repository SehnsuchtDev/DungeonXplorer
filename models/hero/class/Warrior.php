<?php

namespace dungeonxplorer\hero\class;

use dungeonxplorer\monster\Monster;
use dungeonxplorer\item\Armor;
use dungeonxplorer\managers\ItemManager;

class Warrior extends \dungeonxplorer\hero\Hero{

    private Armor $armor;     // Armor

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        if (isset($donnees['he_armor'])) {
            $item = ItemManager::getInstance()->getItem($donnees['he_armor']);
            if ($item instanceof Armor)
                $this->armor = $item;
        }
    }

    public function setArmor(Armor $newArmor) : void{
        $this->armor = $newArmor;
    }


    public function __construct($pv, $strength, $initiative,$armor){
        parent::__construct($pv, $strength, $initiative, null);
        $this->armor = $armor;
    }

    public function attack(Monster $monster): void{
        $strength = 0;
        if($this->getPrimaryWeapon() instanceof Weapon){
            $strength = $this->getPrimaryWeapon()->getStrength();
        }
        $attaque = rand(1,6) + parent::getStrength() + $strength;
        echo "attaque : $attaque";
        $defense = rand(1,6) + (int)($monster->getStrength()/2);
        echo "defense : $defense";

        $degats = 0;
        if($attaque > $defense){
            $degats = $attaque - $defense;
        }
        if(($monster->getPV() - $degats) <= 0 ){
            $this->kill($monster);
        }
        $monster->setPV($monster->getPV() - $degats);
    }

    public function getArmor(){
        return $this->armor;
    }

}

?>