<?php

namespace dungeonxplorer\hero\class\magic;

abstract class MagicHero extends \dungeonxplorer\hero\Hero{

    public function __construct($pv, $strength, $initiative,$mana){
        parent::__construct($pv, $strength, $initiative,null);
        $this->mana = $mana;
    }

    private $mana = 0;

    public function getMana(){
        return $this->mana;
    }

    public function setMana($mana){
        $this->mana = $mana;
    }
    
}

?>