<?php session_start();

use dungeonxplorer\managers\HeroManager;
use dungeonxplorer\hero\Hero;

require_once __DIR__ . '/../autoload.php';

class HeroSuppressionController{

    public function show(){
        $user = $_SESSION['user'];

        $heroManager = HeroManager::getInstance();
        $heroManager->deleteHero($user->getUserId());
        session_destroy();
        header("location:".FULLURLROOTPATH);
    }

}