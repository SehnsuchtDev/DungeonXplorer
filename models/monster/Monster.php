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

    public function getName(): string
    {
        return $this->name;
    }

    public function getPv(): int
    {
        return $this->pv;
    }

    public function getMana(): int
    {
        return $this->mana;
    }

    public function getInitiative(): int
    {
        return $this->initiative;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getAttack(): string
    {
        return $this->attack;
    }

    public function getXp(): int
    {
        return $this->xp;
    }



}

?>