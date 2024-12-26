<?php

namespace dungeonxplorer\hero\class;

use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\Armor;
use dungeonxplorer\managers\ItemManager;

class Warrior extends Hero{

    private Armor $armor;     // Armor

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        if(isset($donnees['he_armor'])){
            $item = ItemManager::getInstance()->getItem($donnees['he_armor']);
            if($item instanceof Armor)
                $this->armor = $item;
        }

    }

    public function setArmor(Armor $newArmor) : void{
        $armor = $newArmor;
    }

}

?>