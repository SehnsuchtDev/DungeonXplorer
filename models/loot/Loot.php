<?php

namespace dungeonxplorer\loot;

use dungeonxplorer\hero\Hero;
use dungeonxplorer\loot\gain\Gain;

class Loot{

    //private $name = "";
    private array $gain;          // Gain[]

    public function addGain(Gain $gain){
        $this->gain[] = $gain;
    }

    public function give(Hero $hero) : void{
        try {
            foreach ($this->gain as $gain)
                $gain->give($hero);
        }catch (\Exception){};

    }

}