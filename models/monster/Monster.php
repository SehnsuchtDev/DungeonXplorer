<?php

namespace dungeonxplorer\monster;

class Monster{

    private string $name;
    private int $pv;
    private int $mana;
    private int $initiative;
    private int $strength;
    private string $attack;
    private int $xp;

    public function hydrate(array $donnees){
        foreach ($donnees as $key => $value) {
            $property=str_replace('mo_', '', $key);
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

}

?>