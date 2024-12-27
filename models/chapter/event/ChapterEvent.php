<?php


namespace dungeonxplorer\chapter\event;

use dungeonxplorer\loot\Loot;
use dungeonxplorer\managers\LootManager;

abstract class ChapterEvent{

    private Loot $loot;
    private String $image = "";

    private bool $done = false;

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

    public function isDone() : bool{
        return $this->done;
    }

    protected function setDone(bool $done) : void{
        $this->done = $done;
    }

    public function getLoot(): Loot{
        if(!isset($this->loot) && isset($this->lo_id)){
            $this->loot = LootManager::getInstance()->getLoot($this->lo_id);
        }
        return $this->loot;
    }

}

?>