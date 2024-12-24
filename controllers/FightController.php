<?php

use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\monster\Monster;

class FightController{

   /* public function show(){
        session_start();

        $monstre = new Monster(25,5,3);
        $hero = new Warrior(15,5,3);
       
        $_SESSION['hero'] = serialize($hero);
        $_SESSION['monstre'] = serialize($monstre);

        require_once __DIR__."/../views/devview/combatView.php";
    }

    public function startFight(){
        session_start();

        $hero = isset($_SESSION['hero']) ? unserialize($_SESSION['hero']) : null;
        $monstre = isset($_SESSION['monstre']) ? unserialize($_SESSION['monstre']) : null;

        if($hero == null || $monstre == null){
            echo "prob";
        }

        $initiative = $hero->initiativeCalcul($monstre);
        $hero->attack($monstre);
        
        $_SESSION['monstre'] = serialize($monstre);

        require_once __DIR__."/../views/devview/combatView.php";
    }*/

    public function show(){
        
        $monster = new Monster(15,5,1);
        $hero = new Thief(15,5,2,2);

        $initiative = $hero->initiativeCalcul($monster);

        echo '<pre>';
        print_r($initiative);
        echo '<pre></br>';

        echo '<pre>';
        print_r($monster->getPV());
        echo '<pre></br>';

        $hero->attack($monster);

        echo '<pre>';
        print_r($monster->getPV());
        echo '<pre></br>';

        $hero->attack($monster);

        echo '<pre>';
        print_r($monster->getPV());
        echo '<pre></br>';

    }

}