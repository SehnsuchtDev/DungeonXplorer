<?php 

namespace dungeonxplorer\hero;

use dungeonxplorer\chapter\Chapter;
use dungeonxplorer\item\HandItem;
use dungeonxplorer\item\Inventory;
use dungeonxplorer\item\Shield;
use dungeonxplorer\managers\ChapterManager;
use dungeonxplorer\managers\HeroManager;
use dungeonxplorer\managers\ItemManager;
use dungeonxplorer\managers\LevelManager;
use dungeonxplorer\monster\Monster;

require dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'autoload.php';

abstract class Hero{

    protected int $id = 0;
    private string $name = "";
    private int $classHero;
    private ?string $image = null;
    private string $biography = "";
    private int $pv = 0;
    private int $strength = 0;
    private int $initiative = 0;
    private HandItem $primaryWeapon;     // HandItem
    private ?HandItem $secondaryWeapon = null;   // HandItem
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

    public function setSecondaryWeapon($heroSecondaryWeapon){
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

    public function getCurrentChapter(): Chapter
    {
        return $this->currentChapter;
    }

    public function changeChapter(int $chapterId) : bool{
        if($this->getCurrentChapter()->getChapterId() == $chapterId)
            return false;
        if($this->getCurrentChapter()->getChapterEvent() != null && !$this->getCurrentChapter()->getChapterEvent()->isDone())
            return false;
        if($chapterId <= 1){
            $this->death();
            return true;
        }
        $this->getCurrentChapter()->getNextChapter();
        foreach ($this->getCurrentChapter()->getNextChapter() as $nextChapter) {
            if($nextChapter->getChapterId() == $chapterId){
                if($nextChapter->getTreasures() != null)
                    $nextChapter->getTreasures()->give($this);
                $this->setCurrentChapter($nextChapter);
                return true;
            }
        }
        return false;
    }

    public function getPv(): int
    {
        return $this->pv;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getInitiative(): int
    {
        return $this->initiative;
    }
  
    public function setXp(int $xp): void{
        $this->xp = $xp;
        $this->setCurrentLevel(LevelManager::getInstance()->getLevelWithXp($this->getClassHero(),$this->xp)->getLevel());
    }

    public function getXp(): int
    {
        return $this->xp;
    }

    public function getInventory(): Inventory
    {
        return $this->inventory;
    }

    public function addPiece(int $quantity){
        $this->purse += $quantity;
    }

    public function death(){
        //TODO: Restore default heros values
        throw new \Exception("=========== Todo dead function in Hero.php =============");
    }

    public function getPurse(): int
    {
        return $this->purse;
    }


    public function setSpellList(array $heroSpellList){
        $this->spellList = $heroSpellList;
    }


    public function getCurrentChapter(): Chapter
    {
        return $this->currentChapter;
    }

    public function changeChapter(int $chapterId) : bool{
        if($this->getCurrentChapter()->getChapterId() == $chapterId)
            return false;
        if($this->getCurrentChapter()->getChapterEvent() != null && !$this->getCurrentChapter()->getChapterEvent()->isDone())
            return false;
        if($chapterId <= 1){
            $this->death();
            return true;
        }
        $this->getCurrentChapter()->getNextChapter();
        foreach ($this->getCurrentChapter()->getNextChapter() as $nextChapter) {
            if($nextChapter->getChapterId() == $chapterId){
                if($nextChapter->getTreasures() != null)
                    $nextChapter->getTreasures()->give($this);
                $this->setCurrentChapter($nextChapter);
                return true;
            }
        }
        return false;
    }

    public function getPv(): int
    {
        return $this->pv;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getInitiative(): int
    {
        return $this->initiative;
    }

    public function getXp(): int
    {
        return $this->xp;
    }

    public function getInventory(): Inventory
    {
        return $this->inventory;
    }

    public function addPiece(int $quantity){
        $this->purse += $quantity;
    }

    public function death(){
        HeroManager::getInstance()->reset($this);
    }

    public function getPurse(): int
    {
        return $this->purse;
    }

     
    public function getCurrentLevel(){
        return $this->currentLevel;
    }

    public function getPrimaryWeapon(){
        return $this->primaryWeapon;
    }

    public function getSecondaryWeapon() : ?HandItem{
        return $this->secondaryWeapon;
    }

    public abstract function attack(Monster &$monster):void;

    public function getArmorAmount(){
        $armor = 0;
        if($this->getPrimaryWeapon() instanceof Shield)
            $armor += $this->getPrimaryWeapon()->getArmourAmount();
        if($this->getSecondaryWeapon() != null && $this->getSecondaryWeapon() instanceof Shield)
            $armor += $this->getSecondaryWeapon()->getArmourAmount();
        return $armor;

    }

}
