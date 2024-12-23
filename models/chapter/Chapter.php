<?php

namespace dungeonxplorer\chapter;

use Dbconnection;
use dungeonxplorer\chapter\event\ChapterEvent;
use dungeonxplorer\chapter\event\Fight;
use dungeonxplorer\chapter\event\test\MCQTest;

require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';

class Chapter{

    private string $content = "";
    private string $image = "";
    //private array $nextChapter;        // Chapter[]
    private array $nextChaptersId;
    private ChapterEvent $chapterEvent;   // ChapterEvent
    private array $treasures;

    public function getContent(): string{
        return $this->content;
    }

    public function getImage(): string{
        return $this->image;
    }

    public function getChapterEvent(): ?ChapterEvent{
        if(!isset($this->chapterEvent) && isset($this->ce_id)){
            $bdd = \DbConnection::getConnection();

            $stmt = $bdd->prepare("SELECT * FROM ChapterEvent
                                        LEFT JOIN Monster USING(ce_id)
                                        LEFT JOIN MCQTest USING (ce_id)
                                        WHERE ce_id = ?;");
            $stmt->execute([$this->ce_id]);
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 0){
                return null;
            }
            $res=$stmt->fetch();

            if(isset($res['mo_id']))
                $this->chapterEvent = new Fight();
            else
                $this->chapterEvent = new MCQTest();

            $this->chapterEvent->hydrate($res);
        }
        return $this->chapterEvent;
    }


}



?>