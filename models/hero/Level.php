<?php

namespace dungeonxplorer\hero;

use dungeonxplorer\item\potion\Effect;
use dungeonxplorer\loot\gain\GainEffect;

class Level{

    private int $classHero;
    private int $level;
    private int $requiredXP;
    private array $gain;          // Gain[]

    /**
     * @param int $classHero
     * @param int $level
     * @param int $requiredXP
     * @param array $gain
     */
    public function __construct(int $classHero, int $level, int $requiredXP, array $gain)
    {
        $this->classHero = $classHero;
        $this->level = $level;
        $this->requiredXP = $requiredXP;
        $this->gain = $gain;
    }

    public function hydrate(array $donnees): void {
        $this->classHero = $donnees['cl_id'];
        $this->level = $donnees['le_level'];
        $this->requiredXP = $donnees['le_required_xp'];

        if($donnees['le_pv_bonus'] > 0)
            $this->gain[] = new GainEffect(Effect::LIFE, $donnees['le_pv_bonus']);
        if($donnees['le_mana_bonus'] > 0)
            $this->gain[] = new GainEffect(Effect::MANA, $donnees['le_mana_bonus']);
        if($donnees['le_strength_bonus'] > 0)
            $this->gain[] = new GainEffect(Effect::STRENGTH, $donnees['le_strength_bonus']);
        if($donnees['le_initiative_bonus'] > 0)
            $this->gain[] = new GainEffect(Effect::INITIATIVE, $donnees['le_initiative_bonus']);
    }

    public function getLevel(): int
    {
        return $this->level;
    }

}

?>