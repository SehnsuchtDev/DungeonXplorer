<?php

namespace dungeonxplorer\loot;

use dungeonxplorer\loot\gain\Gain;

class Loot{

    //private $name = "";
    private array $gain;          // Gain[]

    public function addGain(Gain $gain){
        $this->gain[] = $gain;
    }

    public function getGains(): array{
        return $this->gain;
    }

}