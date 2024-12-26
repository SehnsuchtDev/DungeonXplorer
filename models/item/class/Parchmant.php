<?php

namespace dungeonxplorer\item\class;

use dungeonxplorer\hero\class\magic\MagicHero;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\ConsumableItem;
use dungeonxplorer\item\potion\Effect;
use dungeonxplorer\loot\gain\GainEffect;

class Parchmant extends ClassItem implements ConsumableItem{

    private int $manaCost = 0;
    private GainEffect $effect;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->manaCost = $donnees['it_manacost'];
        if(isset($donnees['it_effectname'],$donnees['it_effectvalue']))
            $this->effect = new GainEffect(Effect::getEffect($donnees['it_effectname']),$donnees['it_effectvalue']);
    }

    public function consume(Hero $hero): void{
        if(!($hero instanceof MagicHero))
            throw new \Exception("This hero can't use this item");
        $heroMana = $hero->getMana();
        if($heroMana < $this->manaCost)
            throw new \Exception("Not enough mana");
        $hero->setMana($heroMana-$this->manaCost);
        $this->effect->give($hero);
    }

    public function unlimitedUse(): bool{
        return false;
    }
}

?>