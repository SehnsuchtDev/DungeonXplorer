<?php session_start();

use dungeonxplorer\account\User;
use dungeonxplorer\exceptions\NotMagicHeroException;
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\Inventory;

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

    private function redirect(): void{
        header('Location: '.FULLURLROOTPATH.'/chapter');
        exit();
    }

    public function show(){
        $items = array();
        foreach ($this->inventory->getItems() as $item)
            $items[] = ['id' => $item['item']->getId(),
                        'name' => $item['item']->getName(),
                        'quantity' => $item['quantity'],
                        'image' => $item['item']->getImage(),
                        'usable' => $item['item'] instanceof ConsumableItem,
                        'armor' => $item['item'] instanceof Armor,
                        'handitem' => $item['item'] instanceof HandItem
                        ];
        require __DIR__ . '/../views/popupinventory.php';
    }
    public function showDetails(){
        require __DIR__ . '/../views/popupitemsinventory.php';
    }

    public function useItem(int $id): void{
        try{
            $this->inventory->useItemWithId($id,$this->hero);
        }catch (NotMagicHeroException){
            //Skip: effect is not applied
            $this->inventory->removeItemWithId($id,1);
        }
        $this->redirect();
    }

    public function equipPrimaryWeapon(int $id): void{
        $this->inventory->equipPrimaryItemWithId($id,$this->hero);
        $this->redirect();
    }

    public function equipSecondaryWeapon(int $id): void{
        $this->inventory->equipSecondaryItemWithId($id,$this->hero);
        $this->redirect();
    }

    public function dropItem(int $id): void{
        $this->inventory->removeItemWithId($id,1);
        $this->redirect();
    }

    public function equipArmor(int $id): void{
        if(!$this->hero instanceof Warrior){
            throw new \InvalidArgumentException("Only Warrior can equip armor");
        }
        $this->inventory->equipArmorWithId($id,$this->hero);
        $this->redirect();
    }
}