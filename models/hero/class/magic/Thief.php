<?php

namespace dungeonxplorer\hero\class\magic;

class Thief extends MagicHero{

    public function attack(\dungeonxplorer\monster\Monster $monster): void{
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
    

}

?>