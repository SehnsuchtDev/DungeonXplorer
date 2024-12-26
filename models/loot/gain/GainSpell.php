<?php

namespace dungeonxplorer\loot\gain;
use dungeonxplorer\hero\class\magic\Spell;
use dungeonxplorer\hero\class\magic\Wizard;
use dungeonxplorer\hero\Hero;

class GainSpell implements Gain{

    private Spell $spell;     //Spell

    public function __construct(Spell $spell)
    {
        $this->spell = $spell;
    }


    public function give(Hero $hero): void
    {
        if(!$hero instanceof Wizard)
            throw new \Exception("Only wizards can use spells");
        $hero->addSpell($this->spell);
    }
}

?>