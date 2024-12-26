<?php

namespace dungeonxplorer\item\potion;

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

}

?>