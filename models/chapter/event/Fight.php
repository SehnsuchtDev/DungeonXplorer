<?php

namespace dungeonxplorer\chapter\event;

use dungeonxplorer\hero\Hero;
use dungeonxplorer\monster\Monster;

class Fight extends ChapterEvent
{

    private Monster $monster;   // Monster

    private ?bool $playerTurn = null;

    /**
     * Hydrates the Fight event by calling the parent hydrate method 
     */
    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->monster = new Monster();
        $this->monster->hydrate($donnees);
    }

    /**
     * Returns the monster involved in the fight
     */
    public function getMonster(): Monster
    {
        return $this->monster;
    }

    /**
     * Determines if it is the player's turn in the fight, based on initiative
     */
    public function getPlayerTurn(Hero $hero): bool
    {
        if ($this->playerTurn === null)
            $this->playerTurn = self::initiativeCalcul($hero, $this->monster);
        return $this->playerTurn;
    }

    /**
     * Changes the turn between the player and the monster
     */
    private function changeTurn()
    {
        if ($this->playerTurn === null)
            return;
        $this->playerTurn = !$this->playerTurn;
    }

    /**
     * Main fight method, processing the attack turn and checking for victory conditions
     */
    public function fight(Hero &$hero): bool
    {
        $isDead = false;
        if ($this->getPlayerTurn($hero))
            $hero->attack($this->monster);
        else
            $isDead = $this->monster->attack($hero);
        if ($this->monster->isDead()) {
            $this->setDone(true);
            $hero->setXp($hero->getXp() + $this->monster->getXp());
            $this->getLoot()->give($hero);
        }
        $this->changeTurn();
        return $isDead;
    }

    /**
     * Calculates initiative to determine the turn order between the player and the monster
     */
    public static function initiativeCalcul(Hero $hero, Monster $monster): bool
    {
        $initiativeHero = rand(1, 6) + $hero->getInitiative();
        $initiativeMonster = rand(1, 6) + $monster->getInitiative();
        if ($initiativeHero > $initiativeMonster)
            return true;
        return false;
    }


}

?>