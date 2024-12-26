<?php

namespace dungeonxplorer\item\class;

use dungeonxplorer\item\potion\Effect;
use dungeonxplorer\loot\gain\GainEffect;

class Parchmant extends ClassItem{

    private int $manaCost = 0;
    private GainEffect $effect;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->manaCost = $donnees['it_manacost'];
        if(isset($donnees['it_effectname'],$donnees['it_effectvalue']))
            $this->effect = new GainEffect(Effect::getEffect($donnees['it_effectname']),$donnees['it_effectvalue']);
    }
    
}

?>