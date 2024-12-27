<?php

namespace dungeonxplorer\item;

use dungeonxplorer\hero\Hero;

interface HandItem{
    public function equipPrimary(Hero $hero): void;
    public function equipSecondary(Hero $hero): void;
    public function getImage(): string;
}
