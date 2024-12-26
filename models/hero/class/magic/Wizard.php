<?php

namespace dungeonxplorer\hero\class\magic;

use dungeonxplorer\managers\SpellManager;

class Wizard extends MagicHero{

    private $spells = [];

    public function getSpells(): array{
        if(!isset($this->spells) && isset($this->id)){
            $this->spells = SpellManager::getInstance()->getSpellsWithHeroId($this->id);
        }
        return $this->spells;
    }

    public function addSpell(Spell $spell){
        $this->spells[] = $spell;
    }
  
    public function attack(\dungeonxplorer\monster\Monster $monster): void{
        $spell = $this->spells[rand(0, count($this->spells)-1)];
        if(parent::getMana() >= $spell->getManaCost()){
            $attaque_magique = (rand(1,6)+rand(1,6) + $spell->getDamage());
            parent::setMana(parent::getMana() - $spell->getManaCost());
            $defense = rand(1,6) + (int)($monster->getStrength()/2);
            $degats = 0;
            if($attaque_magique > $defense){
                $degats = $attaque_magique - $defense;
            }
            if(($monster->getPV() - $degats) <= 0 ){
                $this->kill($monster);
            }
            $monster->setPV($monster->getPV() - $degats);
        }
        else{
            throw new \Exception("Not enough mana");
        }

    }

}
