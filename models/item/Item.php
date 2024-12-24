<?php

namespace dungeonxplorer\item;

class Item{

    private $name = "";
    private $description = "";
    private $weight = 0;
    private $maxStack = 0;

    public function hydrate(array $donnees): void {
        foreach ($donnees as $key => $value) {
            $property=str_replace('it_', '', $key);

            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }

} 

?>