<?php 

namespace dungeonxplorer\hero;

use Dbconnection;

require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';

abstract class Hero{

    protected int $id = 0;
    private string $name = "";
    //private int $classHero;         // ClassHero
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

    public function hydrate(array $donnees): void {
        foreach ($donnees as $key => $value) {
            $property=str_replace('he', '', $key);

            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
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

}

?>