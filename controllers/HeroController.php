<?php

use dungeonxplorer\managers\HeroManager;
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'autoload.php';

class HeroController{
  
    public function show(): void{
        $heroManager = new HeroManager();
        $data = $heroManager->retrieveAllInformation(11);       // à modifier !!
        require __DIR__ . '/../views/devview/heroHydratation.php';
    }

}

/*
require '../config/dbconnection.php';

$currentHero = [
    'name' => (($bdd->query("select cl_name from Class where cl_id = 1"))->fetch(PDO::FETCH_OBJ))->cl_name
];
*/
?>