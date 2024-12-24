<?php

namespace dungeonxplorer\loot\gain;

use dungeonxplorer\item\Item;

class GainItem implements Gain{

    private Item $item;      // Item
    private int $quantity = 0;

    public function give(){

    }

    public function getItem(): ?Item{
        if(!isset($this->item) && isset($this->it_id)){
            //TODO: Recupèré l'item avec le futur item manager.
        }
        return $this->item;
    }

}

?>