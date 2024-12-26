<?php

namespace dungeonxplorer\item;

class Item{

    private int $id = 0;
    private string $name = "";
    private string $description = "";
    private int $weight = 0;
    private int $maxStack = 0;
    private string $image = "";

    public function hydrate(array $donnees): void {
        foreach ($donnees as $key => $value) {
            $property=str_replace('it_', '', $key);

            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
        $this->maxStack = $donnees['it_maxstack'];
    }

    public function getId(): int{
        return $this->id;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function getWeight(): int{
        return $this->weight;
    }

    public function getMaxStack(): int{
        return $this->maxStack;
    }

    public function getImage(): string
    {
        return $this->image;
    }






}