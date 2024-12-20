<?php 

abstract class Hero{

    private $name = "";
    private $classHero;         // ClassHero
    private $image = "";
    private $biography = "";
    private $pv = 0;
    private $strenght = 0;
    private $initiative = 0;
    private $primaryWeapon;     // HandItem
    private $secondaryWeapon;   // HandItem
    private $spellList;         // array()
    private $xp = 0;    
    private $currentLevel = 0;
    private $currentChapter;    // Chapter
    private $purse = 0;
        
    public function setNameHero($heroName){
        $name = $heroName;
    }

}

?>