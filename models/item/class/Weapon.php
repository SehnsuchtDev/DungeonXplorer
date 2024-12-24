<?php

namespace dungeonxplorer\item\class;

class Weapon extends ClassItem implements \dungeonxplorer\item\HandItem{

    private $strength = 0;

    public function getStrength(){
        return $this->strength;
    }

}

?>