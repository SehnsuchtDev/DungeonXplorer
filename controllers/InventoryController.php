<?php session_start();

use dungeonxplorer\account\User;
use dungeonxplorer\exceptions\NotMagicHeroException;
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

}