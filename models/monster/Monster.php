<?php

namespace dungeonxplorer\monster;

use dungeonxplorer\hero\Hero;

class Monster{

    private $name = "";
    private $pv = 0;
    private $mana = 0;
    private $initiative = 0;
    private $strength = 0;
    private $attack = "";
    private $xp = 0;
    private $loot;      // Loot

    public function __construct($pv, $strength, $initiative){
        $this->pv = $pv;
        $this->strength = $strength;
        $this->initiative = $initiative;
    }


    public function attack(Hero $hero): void{
        $attaque = rand(1,6) + $this->getStrength();
        $defense = $this->defense();

        $degats = max(0,$attaque - $defense);

        $hero->setPV($hero->getPV() - $degats);
    }


    public function setPV(int $pv){
        $this->pv = $pv;
    }


    public function getName(): string{
        return $this->name;
    }

    public function getPV(){
        return $this->pv;
    }

    public function getMana(){
        return $this->mana;
    }

    public function getInitiative(){
        return $this->initiative;
    }

    public function getStrength(){
        return $this->strength;
    }

    public function getAttack(){
        return $this->attack;
    }

    public function getXP(){
        return $this->xp;
    }

    public function getLoot(){
        return $this->loot;
    }

}

?>