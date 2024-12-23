<?php 

namespace dungeonxplorer\hero;

use Dbconnection;

require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';

abstract class Hero{

    private string $name = "";
    //private int $classHero;         // ClassHero
    private string $image = "";
    private string $biography = "";
    private int $pv = 0;
    private int $strength = 0;
    private int $initiative = 0;
    private HandItem $primaryWeapon;     // HandItem
    private HandItem $secondaryWeapon;   // HandItem
    private array $spellList;         // array()
    private int $xp = 0;    
    private int $currentLevel = 0;
    private Chapter $currentChapter;    // Chapter
    private int $purse = 0; 
    
    /*
    public function setName($heroName){
        $name = $heroName;
    }

    public function setClassHero($heroClass){
        $classHero = $classHero;
    }

    public function setImage($heroImage){
        $name = $heroName;
    }

    public function setBiography($heroBiography){
        $myClassHero = $classHero;
    }

    public function setPv($heroPV){
        $pv = $newPV;
    }

    public function setStrenght($heroStrenght){
        $strenght = $heroStrenght;
    }

    public function setInitiative($initiativeHero){
        $initiative = $initiativeHero;
    }

    public function setPrimaryWeapon($heroPrimaryWeapon){
        $primaryWeapon = $heroPrimaryWeapon;
    }

    public function setSecondaryWeapon($heroSecondaryWeapon){
        $secondaryWeapon = $heroSecondaryWeapon;
    }

    public function setSpellList($heroSpellList){
        $spellList = $spellListHero;
    }

    public function setXp($heroXP){
        $xp = $heroXP;
    }

    public function setCurrentLevel($heroCurrentLevel){
        $currentLevel = $heroCurrentLevel;
    }

    public function setCurrentChapter($heroCurrentChapter){
        $currentChapter = $heroCurrentChapter;
    }

    public function setPurse($heroPurse){
        $purse = $heroPurse;
    }
    */
}

?>