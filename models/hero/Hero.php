<?php 

namespace dungeonxplorer\hero;

abstract class Hero{

    private int $id;
    private string $name = "";
    private int $classHero;         // ClassHero
    private string $image = "";
    private string $biography = "";
    private int $pv = 0;
    private int $strenght = 0;
    private int $initiative = 0;
    private HandItem $primaryWeapon;     // HandItem
    private HandItem $secondaryWeapon;   // HandItem
    private array $spellList;         // array()
    private int $xp = 0;    
    private int $currentLevel = 0;
    private Chapter $currentChapter;    // Chapter
    private int $purse = 0;

    public function getId(){
        return $this->id;
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

    public function setStrenght($heroStrenght){
        $this->strenght = $heroStrenght;
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
}

?>