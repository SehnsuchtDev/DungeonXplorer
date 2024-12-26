<?php

namespace dungeonxplorer\item\class;

class Weapon extends ClassItem implements \dungeonxplorer\item\HandItem{

    private int $strenght = 0;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->strenght = $donnees['it_damage'];
    }


}

?>