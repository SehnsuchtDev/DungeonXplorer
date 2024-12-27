<?php

namespace dungeonxplorer\item;

class Shield extends Item implements HandItem{
    use HandItemTrait;

    private int $armorAmount = 0;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        if(isset($donnees['it_protectvalue'])){
            $this->armorAmount = $donnees['it_protectvalue'];
        }
    }


    public function getArmourAmount() : int{
        return $this->armorAmount;
    }

}

?>