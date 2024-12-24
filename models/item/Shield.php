<?php

namespace dungeonxplorer\item;

class Shield extends Item implements HandItem{

    private $armorAmount = 0;


    public function getArmourAmount() : int{
        return $this->armorAmount;
    }

}

?>