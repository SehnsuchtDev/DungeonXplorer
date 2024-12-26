<?php

namespace dungeonxplorer\item;

define('MAXWEIGHT', 15);
class Inventory{

    private array $items = [];

    public function addItem(Item $item, int $quantity): void {
        $weight = $this->calculateWeight();
        if($weight + $item->getWeight() * $quantity > MAXWEIGHT){
            return;
        }

        if(array_key_exists($item->getId(), $this->items)){
            $this->items[$item->getId()]['quantity'] += $quantity;
        }else{
            $this->items[$item->getId()] = ['item' => $item, 'quantity' => $quantity];
        }
        if($this->items[$item->getId()]['quantity'] > $item->getMaxStack()){
            $this->items[$item->getId()]['quantity'] = $item->getMaxStack();
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    private function calculateWeight(): int {
        $weight = 0;
        foreach($this->items as $item){
            $weight += $item['item']->getWeight() * $item['quantity'];
        }
        return $weight;
    }



}