<?php


namespace dungeonxplorer\chapter\event\test;

require dirname(__DIR__,4) . DIRECTORY_SEPARATOR . 'autoload.php';

class MCQTest extends ChapterTest{

    private string $questions = "";
    private array $choices = [""];
    private int $answer = 0;

    public function hydrate(array $donnees): void
    {


        parent::hydrate($donnees);
        $this->questions = $donnees["mcqt_question"];
        $this->answer = $donnees["mcqta_anwser_num"];
        $this->ce_id = $donnees["ce_id"];

    }

    public function getChoices(): array{
        if(!isset($this->choices) && isset($this->ce_id)){
            $bdd = \Dbconnection::getConnection();

            $stmt = $bdd->prepare("SELECT mcqt_answer FROM MCQAnswer
                                                           WHERE ce_id = ?
                                                           ORDER BY mcqt_answer_num;");
            $stmt->execute([$this->ce_id]);
            $this->choices = $stmt->fetchAll(\PDO::FETCH_COLUMN);
        }
        return $this->choices;
    }








}

?>