<?php

namespace dungeonxplorer\hero\class\magic;

use dungeonxplorer\monster\Monster;

class Thief extends MagicHero{

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
    

}

?>