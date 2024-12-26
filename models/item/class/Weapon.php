<?php

namespace dungeonxplorer\item\class;

use dungeonxplorer\item\HandItem;
use dungeonxplorer\item\HandItemTrait;

class Weapon extends ClassItem implements HandItem{
    use HandItemTrait;

    private int $strength = 0;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->strength = $donnees['it_damage'];
    }
  
    public function getStrength(){
        return $this->strength;
    }

}

?>