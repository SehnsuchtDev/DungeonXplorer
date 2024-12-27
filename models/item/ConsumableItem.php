<?php

namespace dungeonxplorer\item;

use dungeonxplorer\hero\Hero;

interface ConsumableItem{

    public function consume(Hero $hero): void;

    public function unlimitedUse(): bool;

}