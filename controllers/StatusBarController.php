<?php if(session_status()!=PHP_SESSION_ACTIVE) session_start();

use dungeonxplorer\account\User;
use dungeonxplorer\chapter\event\Fight;
use dungeonxplorer\chapter\event\test\MCQTest;
use dungeonxplorer\hero\class\magic\MagicHero;
use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\magic\Wizard;
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\item\Armor;
use dungeonxplorer\item\ConsumableItem;
use dungeonxplorer\item\HandItem;

class StatusBarController{

    private User $user;
    private ?Hero $hero = null;


    public function __construct(){
        if(!array_key_exists('user', $_SESSION) && !isset($_SESSION['user'])){
            return;
        }
        $this->user = $_SESSION['user'];
        $this->hero = $this->user->getHero();
    }

    public function showEmptyDiv(){
        echo '<div id="hero-data"></div>';
        return;
    }

    public function show(){
        if(!isset($this->hero) && $this->hero == null){
            $this->showEmptyDiv();
            return;
        }
        $hero['pv'] = $this->hero->getPv();
        $hero['strength'] = $this->hero->getStrength();
        $hero['initiative'] = $this->hero->getInitiative();
        if($this->hero instanceof MagicHero)
            $hero['mana'] = $this->hero->getMana();
        $hero['armor'] = $this->hero->getArmorAmount();
        $hero['xp'] = $this->hero->getXp();
        $hero['level'] = $this->hero->getCurrentLevel();

        if($this->hero->getPrimaryWeapon() != null)
            $primaryWeaponImage = $this->hero->getPrimaryWeapon()->getImage();

        if($this->hero->getSecondaryWeapon() != null)
            $secondaryWeaponImage = $this->hero->getSecondaryWeapon()->getImage();

        if($this->hero instanceof Warrior && $this->hero->getArmor() !== null){
            $armorImage = $this->hero->getArmor()->getImage();
        }


        require dirname(__DIR__). DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR .'shared'. DIRECTORY_SEPARATOR. 'hero_data.php';
    }



}