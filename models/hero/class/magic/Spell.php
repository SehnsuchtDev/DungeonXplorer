<?php

namespace dungeonxplorer\hero\class\magic;

class Spell{

    private string $name = "";
    private int $manaCost = 0;
    private int $damage = 0;

    public function getName() : string{
        return $this->name;
    }

    public function getManaCost() : int{
        return $this->manaCost;
    }

    public function getDamage() : int{
        return $this->damage;
    }


    public function setName($name){
        $this->name = $name;
    }

    public function setManaCost($mana){
        $this->manaCost = $mana;
    }

    public function setDamage($damage){
        $this->damage = $damage;
    }

}

?>