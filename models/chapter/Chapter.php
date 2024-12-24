<?php

namespace dungeonxplorer\chapter;

use Dbconnection;
use dungeonxplorer\chapter\event\ChapterEvent;
use dungeonxplorer\chapter\event\Fight;
use dungeonxplorer\chapter\event\test\MCQTest;
use dungeonxplorer\loot\Loot;
use dungeonxplorer\managers\ChapterManager;
use dungeonxplorer\managers\LootManager;

require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';

class Chapter{


    private int $chapterId;
    private string $content = "";
    private string $image = "";
    private array $nextChapter;        // Chapter[]
    private ChapterEvent $chapterEvent;   // ChapterEvent
    private Loot $treasures; //Loot

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

    public function getNextChapter(): array{
        if(!isset($this->nextChapter) && isset($this->chapterId)){
            $bdd = \DbConnection::getConnection();

            $this->nextChapter = [];
            $stmt = $bdd->prepare("SELECT li_next_chapter_id FROM Links where ch_id=?;");
            $stmt->execute([$this->chapterId]);
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($stmt->fetchAll() as $row){
                $this->nextChapter[] = ChapterManager::getInstance()->getChapter($row['li_next_chapter_id']);
            }
        }
        return $this->nextChapter;
    }

    public function getTreasures(): ?Loot
    {
        if(!isset($this->treasures) && isset($this->lo_id)){
            $this->treasures = LootManager::getInstance()->getLoot($this->lo_id);
        }
        return $this->treasures;
    }





}



?>