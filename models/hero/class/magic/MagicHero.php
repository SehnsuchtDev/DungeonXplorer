<?php

namespace dungeonxplorer\hero\class\magic;

abstract class MagicHero extends \dungeonxplorer\hero\Hero{

    public function __construct($pv, $strength, $initiative,$mana){
        parent::__construct($pv, $strength, $initiative,null);
        $this->mana = $mana;
    }

    private $mana = 0;


    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->mana = $donnees['he_mana'];
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function setMana(int $mana): void
    {
        $this->mana = $mana;
    }


    public function getMana(){
        return $this->mana;
    }

    public function setMana($mana){
        $this->mana = $mana;
    }
    
}

?>