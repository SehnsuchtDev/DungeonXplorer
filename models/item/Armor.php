<?php

namespace dungeonxplorer\item;

class Armor extends Item{

    private int $armorAmount = 0;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        if(isset($donnees['it_protectvalue'])){
            $this->armorAmount = $donnees['it_protectvalue'];
        }
    }


}

?>