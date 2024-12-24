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


}
