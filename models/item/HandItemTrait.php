<?php

namespace dungeonxplorer\item;

use dungeonxplorer\hero\Hero;

trait HandItemTrait
{
    public function equipPrimary(Hero $hero): void
    {
        $primary = $hero->getPrimaryWeapon();
        if ($primary != null) {
            $hero->getInventory()->addItem($primary, 1);
        }
        $hero->setPrimaryWeapon($this);
    }

    public function equipSecondary(Hero $hero): void
    {
        $secondary = $hero->getSecondaryWeapon();
        if ($secondary != null) {
            $hero->getInventory()->addItem($secondary, 1);
        }
        $hero->setSecondaryWeapon($this);
    }
}