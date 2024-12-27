<?php

use dungeonxplorer\account\User;
use dungeonxplorer\exceptions\NotMagicHeroException;
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\Armor;
use dungeonxplorer\item\ConsumableItem;
use dungeonxplorer\item\HandItem;
use dungeonxplorer\item\Inventory;
use dungeonxplorer\managers\ItemManager;

class InventoryController{

    private User $user;
    private Hero $hero;
    private Inventory $inventory;

    public function __construct(){
        $this->user = $_SESSION['user'];
        if(!isset($this->user)){
            header('Location: '.FULLURLROOTPATH.'/login');
            exit();
        }
        $this->hero = $this->user->getHero();
        if(!isset($this->hero)){
            header('Location: '.FULLURLROOTPATH.'/hero');
            exit();
        }
        $this->inventory = $this->hero->getInventory();
    }

    public function show(){
        $items = array();
        $weight = $this->inventory->calculateWeight();
        foreach ($this->inventory->getItems() as $item)
            $items[] = ['id' => $item['item']->getId(),
                        'quantity' => $item['quantity'],
                        'image' => $item['item']->getImage()
                        ];
        require __DIR__ . '/../views/popupinventory.php';
    }

    public function showInventroyDetails(int $id){
        $inventory = true;
        $itemModel = $this->inventory->getItems()[$id];
        $item = ['id' => $itemModel['item']->getId(),
                'name' => $itemModel['item']->getName(),
                'desc' => $itemModel['item']->getDescription(),
                'quantity' => $itemModel['quantity'],
                'image' => $itemModel['item']->getImage(),
                'usable' => $itemModel['item'] instanceof ConsumableItem,
                'armor' => $itemModel['item'] instanceof Armor,
                'handitem' => $itemModel['item'] instanceof HandItem
                ];
        require __DIR__ . '/../views/popupitemsinventory.php';
    }

    public function showItemDetails(int $id){
        $itemModel = ItemManager::getInstance()->getItem($id);
        if($itemModel == null){
            throw new \InvalidArgumentException("Item not found");
        }
        $item = ['id' => $itemModel->getId(),
            'name' => $itemModel->getName(),
            'desc' => $itemModel->getDescription(),
            'image' => $itemModel->getImage()
        ];
        require __DIR__ . '/../views/popupitemsinventory.php';
    }

    public function useItem(int $id): void{
        try{
            $this->inventory->useItemWithId($id,$this->hero);
        }catch (NotMagicHeroException){
            //Skip: effect is not applied
            $this->inventory->removeItemWithId($id,1);
        }
    }

    public function equipPrimaryWeapon(int $id): void{
        $this->inventory->equipPrimaryItemWithId($id,$this->hero);
    }

    public function equipSecondaryWeapon(int $id): void{
        $this->inventory->equipSecondaryItemWithId($id,$this->hero);
    }

    public function dropItem(int $id): void{
        $this->inventory->removeItemWithId($id,1);
    }

    public function equipArmor(int $id): void{
        if(!$this->hero instanceof Warrior){
            throw new \InvalidArgumentException("Only Warrior can equip armor");
        }
        $this->inventory->equipArmorWithId($id,$this->hero);
    }
}