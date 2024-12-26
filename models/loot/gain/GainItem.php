<?php

namespace dungeonxplorer\loot\gain;

use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\class\ClassItem;
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


    public function getItem(): ?Item{
        if(!isset($this->item) && isset($this->it_id)){
            $this->item = ItemManager::getInstance()->getItem($this->it_id);
        }
        return $this->item;
    }

    public function give(Hero $hero): void
    {
        if($this->getItem() instanceof ClassItem){
            foreach ($this->getItem()->getAllowedClass() as $class) {
                if (get_class($hero) === $class) {
                    $hero->getInventory()->addItem($this->getItem(), $this->quantity);
                    return;
                }
            }
        }else
            $hero->getInventory()->addItem($this->getItem(), $this->quantity);
    }
}

?>