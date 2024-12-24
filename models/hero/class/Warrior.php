<?php

namespace dungeonxplorer\hero\class;

use dungeonxplorer\monster\Monster;

class Warrior extends \dungeonxplorer\hero\Hero{

    private $armor;     // Armor

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

        $monster->setPV($monster->getPV() - $degats);
    }

    public function getArmor(){
        return $this->armor;
    }

}

?>