<?php

namespace dungeonxplorer\item;

class Inventory{

    private array $items = [];


    public function addItem(Item $item, int $quantity): void {
        if(array_key_exists($item->getId(), $this->items)){
            $this->items[$item->getId()]['quantity'] += $quantity;
        }else{
            $this->items[$item->getId()] = ['item' => $item, 'quantity' => $quantity];
        }
    }

}