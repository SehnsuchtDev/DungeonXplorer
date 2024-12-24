<?php

namespace dungeonxplorer\item\class;

class MagicWand extends ClassItem implements \dungeonxplorer\item\HandItem{

    private int $manaCost = 0;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->manaCost = $donnees['it_manacost'];
    }


}

?>