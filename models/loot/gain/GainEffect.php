<?php

namespace dungeonxplorer\loot\gain;

use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\potion\Effect;

class GainEffect implements Gain {

    private Effect $effect;    //Enum Effect
    private int $quantity = 0;

    /**
     * @param $effect
     * @param int $quantity
     */
    public function __construct(Effect $effect, int $quantity)
    {
        $this->effect = $effect;
        $this->quantity = $quantity;
    }


    public function give(Hero $hero): void{
        $this->effect->apply($hero, $this->quantity);
    }
}

?>