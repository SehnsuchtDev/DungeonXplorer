<?php session_start();
/*
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\magic\Wizzard;
*/

use dungeonxplorer\managers\HeroManager;

require_once __DIR__ . '/../autoload.php';

class HeroCreationController{

    public function show() :void{
        echo '<pre>';
        var_dump($_SESSION['user']);
        var_dump($_SESSION['user']->getHero());
        echo '</pre></br>';
        if($_SESSION['user']->getHero() != null){ 
            echo 'Vous avez déjà un héro !!!';
            require __DIR__ . "/../views/devview/infoHero.php";
        }else{
            require __DIR__ . "/../views/devview/hero.php";
        }
    }
    
    public function creation() :void{
        $errors = [];

        $name = $_POST["name"] ?? '';
        $biography = $_POST["biography"] ?? '';
        $class = $_POST["class"];

        echo "name : " . $name . ", bio : " . $biography . ", class : " . $class;

        if(empty($name)){
            $errors[] = "Vous devez saisir un nom pour votre héro";
        }

        if(empty($errors)){
            $heroManager = HeroManager::getInstance();
            $hero = $heroManager->createHero($name, $biography, $class);
            $_SESSION['user']->setHero($hero);
        }


        require __DIR__ . "/../views/devview/infoHero.php";
    }

}

?>