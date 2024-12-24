<?php

namespace dungeonxplorer\hero\class\magic;

class Spell{

    private $name = "";
    private $manaCost = 0;
    private $damage = 0;

    public function __construct($name, $manaCost, $damage){
        $this->name = $name;
        $this->manaCost = $manaCost;
        $this->damage = $damage;
    }

    public function getName(){
        return $this->name;
    }

    public function getManaCost(){
        return $this->manaCost;
    }

    public function getDamage(){
        return $this->damage;
    }


}

?>