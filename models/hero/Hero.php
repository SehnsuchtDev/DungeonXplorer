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
    private ?string $image = null;
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
        //TODO: Restore default heros values
        throw new \Exception("=========== Todo dead function in Hero.php =============");
    }

    public function getPurse(): int
    {
        return $this->purse;
    }

     
    public function getCurrentLevel(){
        return $this->currentLevel;
    }

    public function getCurrentChapter(){
        return $this->currentChapter;
    }

    public function getInitiative(){
        return $this->initiative;
    }

    public function getPV(){
        return $this->pv;
    }

    public function getStrength(){
        return $this->strength;
    }

    public function getName(){
        return $this->name;
    }

    public function getClassHero(){
        return $this->classHero;
    }

    public function getImage(){
        return $this->image;
    }

    public function getBiography(){
        return $this->biography;
    }

    public function getPurse(){
        return $this->purse;
    }

    public function getPrimaryWeapon(){
        return $this->primaryWeapon;
    }

    public function getSecondaryWeapon(){
        return $this->secondaryWeapon;
    }

    public function getXP(){
        return $this->xp;
    }
    
    public abstract function attack(Monster $monster):void;
  
    public function setPV(int $pv){
        $this->pv = $pv;
    }

    //Renvoie 1 si le monstre à l'initiative et 0 si c'est le héros
    public function initiativeCalcul(Monster $monster){
        $initiativeHero = rand(1,6) + $this->getInitiative();
        $initiativeMonster = rand(1,6) + $monster->getInitiative();

        if( $initiativeHero < $initiativeMonster ){
            return 1;
        }
        else if( $initiativeHero > $initiativeMonster ){
            return 0;
        }
        else{
            return 1;
        }
    }

}




?>