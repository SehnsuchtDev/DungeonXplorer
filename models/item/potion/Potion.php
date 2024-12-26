<?php

namespace dungeonxplorer\item\potion;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\ConsumableItem;
use dungeonxplorer\item\Item;
use dungeonxplorer\loot\gain\GainEffect;

class Potion extends Item implements ConsumableItem {

    private GainEffect $effect;     // GainEffect


    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        if(isset($donnees['it_effectname'],$donnees['it_effectvalue']))
            $this->effect = new GainEffect(Effect::getEffect($donnees['it_effectname']),$donnees['it_effectvalue']);
    }


    public function consume(Hero $hero): void{
        $this->effect->give($hero);
    }


    public function unlimitedUse(): bool{
        return false;
    }
}

?>