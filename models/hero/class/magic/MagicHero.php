<?php

namespace dungeonxplorer\hero\class\magic;

abstract class MagicHero extends \dungeonxplorer\hero\Hero{

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


    
}

?>