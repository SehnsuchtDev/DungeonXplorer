<?php

namespace dungeonxplorer\loot\gain;
class GainPiece implements Gain{

    private $quantity = 0;

    /**
     * @param int $quantity
     */
    public function __construct(int $quantity)
    {
        $this->quantity = $quantity;
    }


    public function give(){

    }

}

?>