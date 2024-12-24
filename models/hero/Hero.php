<?php 

namespace dungeonxplorer\hero;

use dungeonxplorer\monster\Monster;

abstract class Hero{

    private $name = "";
    private $classHero;         // ClassHero
    private $image = "";
    private $biography = "";
    private $pv = 0;
    private $strength = 0;
    private $initiative = 0;
    private $primaryWeapon;     // HandItem
    private $secondaryWeapon;   // HandItem
    private $spellList;         // array()
    private $xp = 0;    
    private $currentLevel = 0;
    private $currentChapter;    // Chapter
    private $purse = 0;

    public function __construct($pv,$strength,$initiative,$spellList){
        $this->pv = $pv;
        $this->strength = $strength;
        $this->initiative = $initiative;
        $this->spellList = $spellList;
    }
    
    public function getSpellList() : array{
        return $this->spellList;
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
        $this->pV = $pv;
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