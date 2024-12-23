<?php

namespace dungeonxplorer\item\potion;

class GainEffect{

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


}

?>