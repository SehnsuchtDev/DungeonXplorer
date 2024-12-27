<?php

namespace dungeonxplorer\monster;

use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\Shield;

class Monster{

    private string $name;
    private int $pv;
    private int $mana;
    private int $initiative;
    private int $strength;
    private string $attack;
    private int $xp;

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value) {
            $property=str_replace('mo_', '', $key);
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPv(): int
    {
        return $this->pv;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function getInitiative(): int
    {
        return $this->initiative;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getAttack(): string
    {
        return $this->attack;
    }

    public function getXp(): int
    {
        return $this->xp;
    }


    public function attack(Hero &$hero): bool{
        $attaque = rand(1,6) + $this->getStrength() + $this->getMana();
        $defense = rand(1,6) + (int)($hero->getStrength()/2);
        if($hero instanceof Warrior){
            $defense += $defense + $hero->getArmor();
        }
        if($hero->getPrimaryWeapon() instanceOf Shield){
            $defense += $defense + $hero->getPrimaryWeapon()->getArmourAmount();
        }
        $degats = 0;
        if($attaque > $defense){
            $degats = $attaque - $defense;
        }
        if(($hero->getPV() - $degats) <= 0 ){
            $hero->death();
            return true;
        }
        $hero->setPV($hero->getPV() - $degats);
        return false;
    }


    public function setPV(int $pv){
        $this->pv = $pv;
        if($this->pv < 0)
            $this->pv = 0;
    }

    public function isDead() : bool{
        return $this->pv <= 0;
    }

}
