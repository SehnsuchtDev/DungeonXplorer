<?php


namespace dungeonxplorer\chapter\event;

use dungeonxplorer\loot\Loot;

abstract class ChapterEvent{

    private Loot $loot;
    private String $image = "";

    public function hydrate(array $donnees): void {
        foreach ($donnees as $key => $value) {
            $property=str_replace('ce_', '', $key);

            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
        if(isset($donnees["lo_id"]))
            $this->lo_id = $donnees["lo_id"];
    }


}

?>