<?php

namespace dungeonxplorer\item;

use dungeonxplorer\hero\class\Warrior;

class Armor extends Item{

    private int $armorAmount = 0;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        if(isset($donnees['it_protectvalue'])){
            $this->armorAmount = $donnees['it_protectvalue'];
        }
    }

    public function equip(Warrior $hero){
        $hero->setArmor($this);
    }

    public function getArmorAmount(): int
    {
        return $this->armorAmount;
    }




}

?>