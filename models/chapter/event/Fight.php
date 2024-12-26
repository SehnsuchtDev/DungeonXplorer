<?php

namespace dungeonxplorer\chapter\event;

use dungeonxplorer\monster\Monster;

class Fight extends ChapterEvent{

    private $monster;   // Monster

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->monster = new Monster();
        $this->monster->hydrate($donnees);
    }
}

?>