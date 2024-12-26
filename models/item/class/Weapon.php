<?php

namespace dungeonxplorer\item\class;

class Weapon extends ClassItem implements \dungeonxplorer\item\HandItem{

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