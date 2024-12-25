<?php 

namespace dungeonxplorer\hero;

use dungeonxplorer\chapter\Chapter;
use dungeonxplorer\item\HandItem;
use dungeonxplorer\item\Inventory;
use dungeonxplorer\managers\ChapterManager;
use dungeonxplorer\managers\ItemManager;

require dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'autoload.php';

abstract class Hero{

    protected int $id = 0;
    private string $name = "";
    private int $classHero;
    private string $image = "";
    private string $biography = "";
    private int $pv = 0;
    private int $strength = 0;
    private int $initiative = 0;
    private HandItem $primaryWeapon;     // HandItem
    private HandItem $secondaryWeapon;   // HandItem
    private int $xp = 0;
    private int $currentLevel = 0;
    private Chapter $currentChapter;    // Chapter
    private int $purse = 0;
    private Inventory $inventory;        // Inventory

    public function hydrate(array $donnees): void {

        foreach ($donnees as $key => $value) {
            $property=str_replace('he_', '', $key);

            if (property_exists(self::class, $property)) {
                $this->$property = $value;
            }
        }
        $this->classHero = $donnees['cl_id'];
        $this->currentLevel = $donnees['he_current_level'];
        $this->currentChapter = ChapterManager::getInstance()->getChapter($donnees['ch_id']);

        if(isset($donnees['he_primary_weapon'])){
            $item = ItemManager::getInstance()->getItem($donnees['he_primary_weapon']);
            if($item instanceof HandItem)
                $this->primaryWeapon = $item;
        }

        if(isset($donnees['he_secondary_weapon'])){
            $item = ItemManager::getInstance()->getItem($donnees['he_secondary_weapon']);
            if($item instanceof HandItem)
                $this->primaryWeapon = $item;
        }
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setInventory(Inventory $inventory): void
    {
        $this->inventory = $inventory;
    }

    public function setId($heroId){
        $this->id = $heroId;
    }

    public function setName($heroName){
        $this->name = $heroName;
    }

    public function setClassHero($heroClass){
        $this->classHero = $heroClass;
    }

    public function setImage($heroImage){
        $this->image = $heroImage;
    }

    public function setBiography($heroBiography){
        $this->biography = $heroBiography;
    }

    public function setPv($heroPV){
        $this->pv = $heroPV;
    }

    public function setInitiative($initiativeHero){
        $this->initiative = $initiativeHero;
    }

    public function setPrimaryWeapon(HandItem $heroPrimaryWeapon){
        $this->primaryWeapon = $heroPrimaryWeapon;
    }

    public function setSecondaryWeapon(HandItem $heroSecondaryWeapon){
        $this->secondaryWeapon = $heroSecondaryWeapon;
    }

    public function setSpellList(array $heroSpellList){
        $this->spellList = $heroSpellList;
    }

    public function setXp($heroXP){
        $this->xp = $heroXP;
    }

    public function setCurrentLevel($heroCurrentLevel){
        $this->currentLevel = $heroCurrentLevel;
    }

    public function setCurrentChapter(Chapter $heroCurrentChapter){
        $this->currentChapter = $heroCurrentChapter;
    }

    public function setPurse($heroPurse){
        $this->purse = $heroPurse;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }


}

?>