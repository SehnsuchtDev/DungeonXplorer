<?php

namespace dungeonxplorer\chapter\event;

use dungeonxplorer\hero\Hero;
use dungeonxplorer\monster\Monster;

class Fight extends ChapterEvent{

    private Monster $monster;   // Monster

    private ?bool $playerTurn = null;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->monster = new Monster();
        $this->monster->hydrate($donnees);
    }

    public function getMonster() : Monster{
        return $this->monster;
    }

    public function getPlayerTurn(Hero $hero): bool{
        if($this->playerTurn === null)
            $this->playerTurn = self::initiativeCalcul($hero,$this->monster);
        return $this->playerTurn;
    }


    private function changeTurn(){
        if($this->playerTurn === null) return;
        $this->playerTurn=!$this->playerTurn;
    }

    public function fight(Hero &$hero) : void{
        if($this->getPlayerTurn($hero))
            $hero->attack($this->monster);
        else
            $this->monster->attack($hero);
        if($this->monster->isDead()){
            $this->setDone(true);
            $hero->setXp($hero->getXp() + $this->monster->getXp());
            $this->getLoot()->give($hero);
            return;
        }
        $this->changeTurn();
    }

    public static function initiativeCalcul(Hero $hero,Monster $monster) : bool{
        $initiativeHero = rand(1,6) + $hero->getInitiative();
        $initiativeMonster = rand(1,6) + $monster->getInitiative();
        if( $initiativeHero > $initiativeMonster )
            return true;
        return false;
    }


}

?>