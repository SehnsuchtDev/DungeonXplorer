<?php

use dungeonxplorer\chapter\event\Fight;
use dungeonxplorer\chapter\event\test\MCQTest;
use dungeonxplorer\managers\ChapterManager;

class ChapterController{

    public function show(int $id){
        $this->showChapter($id);
    }

    public function showChapter(int $id,bool $mcqAnswer = null) : void
    {

        $chapter = ChapterManager::getInstance()->getChapter($id);

        $chapterId = $chapter->getChapterId();
        $content = $chapter->getContent();
        $image = $chapter->getImage();

        $nextChapterId = [];
        foreach ($chapter->getNextChapter() as $nextChapter) {
            $nextChapterId[] = $nextChapter->getChapterId();
        }

        //MCQ Test
        $mcq = $chapter->getChapterEvent() instanceof MCQTest;
        if ($mcq) {
            $mcqQuestion = $chapter->getChapterEvent()->getQuestions();
            $mcqChoices = $chapter->getChapterEvent()->getChoices();
        }

        $fight = $chapter->getChapterEvent() instanceof Fight;
        if ($fight){
            $monsterModel = $chapter->getChapterEvent()->getMonster();
            $monster = array();
            $monster['name'] = $monsterModel->getName();
            $monster['pv'] = $monsterModel->getPv();
            $monster['initiative'] = $monsterModel->getInitiative();
            $monster['mana'] = $monsterModel->getMana();
            $monster['xp'] = $monsterModel->getXp();
        }

        require dirname(__DIR__). DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'devview' . DIRECTORY_SEPARATOR . 'chapter.php';
    }

    public function MCQTestAnswer(int $id) : void{
        $chapter = ChapterManager::getInstance()->getChapter($id);
        $mcq = $chapter->getChapterEvent();
        if($mcq instanceof MCQTest){
            $answer = $mcq->getAnswer();
            $choice = $_POST['choice'];
            $mcqAnswer = ($answer == ($choice+1));
        }


        $this->showChapter($id,$mcqAnswer);
    }

}