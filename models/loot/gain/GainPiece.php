<?php

namespace dungeonxplorer\loot\gain;
use dungeonxplorer\hero\Hero;

class GainPiece implements Gain{

    private $quantity = 0;

    /**
     * @param int $quantity
     */
    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }


    public function give(Hero $hero): void
    {
        $hero->addPiece($this->quantity);
    }
}

?>