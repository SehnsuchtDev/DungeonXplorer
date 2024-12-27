<?php

namespace dungeonxplorer\hero\class;

use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\Armor;
use dungeonxplorer\item\class\Weapon;
use dungeonxplorer\managers\ItemManager;
use dungeonxplorer\monster\Monster;

class Warrior extends Hero{

    private ?Armor $armor = null;     // Armor

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        if (isset($donnees['he_armor'])) {
            $item = ItemManager::getInstance()->getItem($donnees['he_armor']);
            if ($item instanceof Armor)
                $this->armor = $item;
        }
    }

    public function setArmor(?Armor $newArmor) : void{
        $this->armor = $newArmor;
    }


    public function attack(Monster &$monster): void{
        $strength = 0;
        if($this->getPrimaryWeapon() instanceof Weapon){
            $strength = $this->getPrimaryWeapon()->getStrength();
        }
        $attaque = rand(1,6) + parent::getStrength() + $strength;
        $defense = rand(1,6) + (int)($monster->getStrength()/2);

        $degats = 0;
        if($attaque > $defense){
            $degats = $attaque - $defense;
        }
        $monster->setPV($monster->getPV() - $degats);

    }

    public function getArmor() : ?Armor{
        return $this->armor;
    }

    public function getArmorAmount()
    {
        $armor = parent::getArmorAmount();
        if(isset($this->armor) && $this->armor instanceof Armor){
            $armor += $this->armor->getArmorAmount();
        }
        return $armor;
    }

}
