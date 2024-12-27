<?php session_start();

use dungeonxplorer\managers\HeroManager;
use dungeonxplorer\hero\Hero;

require_once __DIR__ . '/../autoload.php';

/**
 * HeroCreationController Class
 * Manages hero creation and the related views in the adventure story mode.
 */

class HeroCreationController
{

    /**
     * Displays the first page of the story mode introduction.
     * Sets the button text based on whether a hero already exists.
     */
    public function showp1(): void
    {
        $bouton = "";
        if ($_SESSION['user']->getHero() != null) {
            $bouton = "Continuez l'aventure !";
        } else {
            $bouton = "Lancez l'aventure !";
        }
        require __DIR__ . "/../views/booktest/StoryMode_Page1.php";
    }

    /**
     * Maps the hero class ID to its corresponding name.
     */
    private function getHeroClassName(int $id): string
    {
        switch ($id) {
            case 1:
                return "Guerrier";
            case 2:
                return "Mage";
            case 3:
                return "Voleur";
        }
        return "";
    }

    /**
     * Displays the second page of story mode.
     * If a hero exists, shows their details; otherwise, shows the hero creation page.
     */
    public function showp2(): void
    {
        if ($_SESSION['user']->getHero() != null) {
            $hero = $_SESSION['user']->getHero();
            $heroName = $hero->getName();
            $heroDescription = $hero->getBiography();
            $heroClasse = $this->getHeroClassName($hero->getClassHero());
            require __DIR__ . "/../views/booktest/StoryMode_Page2.php";
        } else {
            require __DIR__ . "/../views/booktest/StoryModeCreate_Page2.php";
        }
    }

    /**
     * Handles hero creation based on user input.
     * Validates the input and either creates the hero or displays errors.
     */
    public function creation(): void
    {
        $errors = [];

        $heroName = $_POST["name"] ?? '';
        $heroDescription = $_POST["biography"] ?? '';
        $class = $_POST["class"];
        $heroClasse = $this->getHeroClassName($class);

        if (empty($heroName)) {
            $errors[] = "Vous devez saisir un nom pour votre héro";
        }

        if (empty($errors)) {
            $hero = HeroManager::getInstance()->createHero($heroName, $heroDescription, $class);
            $_SESSION['user']->setHero($hero);
            require __DIR__ . "/../views/booktest/StoryMode_Page2.php";
            return;
        }

        require __DIR__ . "/../views/booktest/StoryModeCreate_Page2.php";
    }

}

?>