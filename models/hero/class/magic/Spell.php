<?php

namespace dungeonxplorer\hero\class\magic;

class Spell{

    private $name = "";
    private $manaCost = 0;
    private $damage = 0;

    public function setName($name){
        $this->name = $name;
    }

    public function setManaCost($mana){
        $this->manaCost = $mana;
    }

    public function setDamage($damage){
        $this->damage = $damage;
    }

    public function getName() : string{
        return $this->name;
    }

    public function getManaCost() : int{
        return $this->manaCost;
    }

    public function getDamage() : int{
        return $this->damage;
    }

}

?>