<?php

namespace dungeonxplorer\item\class;

require dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'autoload.php';

abstract class ClassItem extends \dungeonxplorer\item\Item{

    private array $allowedClass;

    public function hydrate(array $donnees): void
    {
        parent::hydrate($donnees);
        $this->it_id = $donnees['it_id'];
    }

    public function getAllowedClass(): array{
        if(!isset($this->allowedClass) && isset($this->it_id)){
            $bdd = \Dbconnection::getConnection();

            $stmt = $bdd->prepare("SELECT cl_id FROM ItemsClass WHERE `it_id` = ?");
            $stmt->execute([$this->it_id]);
            $this->allowedClass = $stmt->fetchAll(\PDO::FETCH_COLUMN);
        }
        return $this->allowedClass;
    }





}

?>