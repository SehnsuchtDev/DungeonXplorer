<?php

namespace dungeonxplorer\item\class;

use dungeonxplorer\item\HandItem;
use dungeonxplorer\item\HandItemTrait;

class MagicWand extends ClassItem implements HandItem{
    use HandItemTrait;

    private int $manaCost = 0;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->manaCost = $donnees['it_manacost'];
    }


}

?>