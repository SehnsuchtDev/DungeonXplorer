<?php

namespace dungeonxplorer\item\potion;

use dungeonxplorer\hero\class\magic\MagicHero;
use dungeonxplorer\hero\Hero;

enum Effect{

    case STRENGTH;
    case LIFE;
    case MANA;
    case INITIATIVE;

    public static function getEffect(string $name) : ?self{
        foreach (self::cases() as $effect){
            if($effect->name === strtoupper($name))
                return $effect;
        }
        return null;
    }

    public function apply(Hero $hero, int $quantity): void{
        switch ($this){
            case self::STRENGTH:
                $hero->setStrength($hero->getStrength() + $quantity);
                break;
            case self::LIFE:
                $hero->setPv($hero->getPv() + $quantity);
                break;
            case self::MANA:
                if(!$hero instanceof MagicHero)
                    throw new \Exception("This hero is not a magic hero");
                $hero->setMana($hero->getMana() + $quantity);
                break;
            case self::INITIATIVE:
                $hero->setInitiative($hero->getInitiative() + $quantity);
                break;
        }
    }

}

?>