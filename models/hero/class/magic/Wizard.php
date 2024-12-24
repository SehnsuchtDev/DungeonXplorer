<?php

namespace dungeonxplorer\hero\class\magic;

class Wizard extends MagicHero{

    private array $spells = []; // Spell[]

    public function __construct($pv, $strength, $initiative,$mana,array $spell = []){
        parent::__construct($pv,$strength, $initiative, $mana);
        $this->spell = $spell;
    }

    public function attack(\dungeonxplorer\monster\Monster $monster): void{
        $spell = $this->spells[rand(1, count($this->spells)-1)];
        if(parent::getMana() >= $spell->getManaCost()){
            $attaque_magique = (rand(1,6)+rand(1,6) + $spell->getDamage());
            parent::setMana(parent::getMana() - $spell->getManaCost());
        }
        else{
            echo "Impossible de réaliser l'attaque car le mana n'est pas suffisant !";
        }

    }

}
