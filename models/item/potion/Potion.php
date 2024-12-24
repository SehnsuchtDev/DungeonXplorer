<?php

namespace dungeonxplorer\item\potion;
use dungeonxplorer\loot\gain\GainEffect;

class Potion extends \dungeonxplorer\item\Item{

    private GainEffect $effect;     // GainEffect


    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        if(isset($donnees['it_effectname'],$donnees['it_effectvalue']))
            $this->effect = new GainEffect(Effect::getEffect($donnees['it_effectname']),$donnees['it_effectvalue']);
    }

}

?>