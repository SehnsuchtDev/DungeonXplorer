<?php

namespace dungeonxplorer\item;

use dungeonxplorer\hero\Hero;

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

    public function countItem(Item $item): int {
        if(array_key_exists($item->getId(), $this->items))
            return $this->items[$item->getId()]['quantity'];
        return 0;
    }

    public function removeItem(Item $item, int $quantity): void {
        $this->removeItemWithId($item->getId(), $quantity);
    }

    public function removeItemWithId(int $id, int $quantity): void {
        if(array_key_exists($id, $this->items)){
            $this->items[$id]['quantity'] -= $quantity;
            if($this->items[$id]['quantity'] <= 0){
                unset($this->items[$id]);
            }
        }
    }

    public function useItemWithId(int $id, Hero $hero) : void{
        if($this->countItem($this->items[$id]['item']) > 0){
            $item = $this->items[$id]['item'];
            if($item instanceof ConsumableItem) {
                $item->consume($hero);
                if (!$item->unlimitedUse()) {
                    $this->removeItem($item, 1);
                }
            }
        }else{
            throw new \InvalidArgumentException("Item not found in inventory");
        }
    }

    public function useItem(Item $item, Hero $hero): void {
        $this->useItemWithId($item->getId(),$hero);
    }

    public function equipPrimaryItemWithId(int $id, Hero $hero): void {
        if($this->countItem($this->items[$id]['item']) >= 1){
            $item = $this->items[$id]['item'];
            if($item instanceof HandItem) {
                $item->equipPrimary($hero);
                $this->removeItem($item, 1);
            }
        }else{
            throw new \InvalidArgumentException("Item not found in inventory");
        }
    }

    public function equipSecondaryItemWithId(int $id, Hero $hero): void {
        if($this->countItem($this->items[$id]['item']) >= 1){
            $item = $this->items[$id]['item'];
            if($item instanceof HandItem) {
                $item->equipSecondary($hero);
                $this->removeItem($item, 1);
            }
        }else{
            throw new \InvalidArgumentException("Item not found in inventory");
        }
    }



}