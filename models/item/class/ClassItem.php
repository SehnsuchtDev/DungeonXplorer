<?php

namespace dungeonxplorer\item\class;

use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\magic\Wizard;
use dungeonxplorer\hero\class\Warrior;

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
            $res = $stmt->fetchAll(\PDO::FETCH_COLUMN);
            $this->allowedClass = array();
            foreach ($res as $r){
                switch ($r){
                    case 1:
                        $this->allowedClass[] = Warrior::class;
                        break;
                    case 2:
                        $this->allowedClass[] = Wizard::class;
                        break;
                    case 3:
                        $this->allowedClass[] = Thief::class;
                        break;
                }
            }
        }
        return $this->allowedClass;
    }





}

?>