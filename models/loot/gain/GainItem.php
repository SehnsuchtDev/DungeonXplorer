<?php

namespace dungeonxplorer\loot\gain;

use dungeonxplorer\item\Item;
use dungeonxplorer\managers\ItemManager;

class GainItem implements Gain{

    private ?Item $item;      // Item
    private int $quantity = 0;

    /**
     * @param Item $item
     * @param int $quantity
     */
    public function __construct(?Item $item, int $quantity)
    {
        $this->item = $item;
        $this->quantity = $quantity;
    }


    public function give(){

    }

    public function getItem(): ?Item{
        if(!isset($this->item) && isset($this->it_id)){
            $this->item = ItemManager::getInstance()->getItem($this->it_id);
        }
        return $this->item;
    }

}

?>