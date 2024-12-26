<?php

namespace dungeonxplorer\loot\gain;

use dungeonxplorer\hero\Hero;

interface Gain{

    public function give(Hero $hero): void;

}

?>