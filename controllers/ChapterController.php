<?php session_start();

use dungeonxplorer\account\User;
use dungeonxplorer\chapter\Chapter;
use dungeonxplorer\chapter\event\Fight;
use dungeonxplorer\chapter\event\test\MCQTest;
use dungeonxplorer\hero\class\magic\MagicHero;
use dungeonxplorer\hero\class\magic\Thief;
use dungeonxplorer\hero\class\magic\Wizard;
use dungeonxplorer\hero\class\Warrior;
use dungeonxplorer\hero\Hero;

class ChapterController{

    private User $user;
    private Hero $hero;

    public function __construct(){
        $this->user = $_SESSION['user'];
        if(!isset($this->user)){
            header('Location: '.FULLURLROOTPATH.'/login');
            exit();
        }
        $this->hero = $this->user->getHero();
        if(!isset($this->hero)){
            header('Location: '.FULLURLROOTPATH.'/hero');
            exit();
        }
    }

    public function show(){
        $this->showChapter();
    }

    public function showChapter(bool $mcqAnswer = null) : void
    {

        $chapterId = $this->getChapter()->getChapterId();
        $content = $this->getChapter()->getContent();
        $image = $this->getChapter()->getImage();

        $hero = array();
        switch (get_class($this->hero)){
            case Wizard::class:
                $hero['class'] = 'Magicien';
                break;
            case Warrior::class:
                $hero['class'] = 'Guerrier';
                break;
            case Thief::class:
                $hero['class'] = 'Voleur';
                break;
        }
        $hero['pv'] = $this->hero->getPv();
        $hero['strength'] = $this->hero->getStrength();
        $hero['initiative'] = $this->hero->getInitiative();
        if($this->hero instanceof MagicHero)
            $hero['mana'] = $this->hero->getMana();
        $hero['xp'] = $this->hero->getXp();

        $items = array();
        foreach ($this->hero->getInventory()->getItems() as $item)
            $items[] = ['name' => $item['item']->getName(), 'quantity' => $item['quantity']];

        $nextChapterId = [];
        foreach ($this->getChapter()->getNextChapter() as $nextChapter) {
            $nextChapterId[] = $nextChapter->getChapterId();
        }



        $mcq = $this->getChapter()->getChapterEvent() instanceof MCQTest;
        if ($mcq) {
            $mcqQuestion = $this->getChapter()->getChapterEvent()->getQuestions();
            $mcqChoices = $this->getChapter()->getChapterEvent()->getChoices();
        }

        $fight = $this->getChapter()->getChapterEvent() instanceof Fight;
        if ($fight){
            $monsterModel = $this->getChapter()->getChapterEvent()->getMonster();
            $monster = array();
            $monster['name'] = $monsterModel->getName();
            $monster['pv'] = $monsterModel->getPv();
            $monster['initiative'] = $monsterModel->getInitiative();
            $monster['mana'] = $monsterModel->getMana();
            $monster['xp'] = $monsterModel->getXp();
        }

        require dirname(__DIR__). DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'devview' . DIRECTORY_SEPARATOR . 'chapter.php';
    }

    public function MCQTestAnswer() : void{
        $mcq = $this->getChapter()->getChapterEvent();
        if($mcq instanceof MCQTest){
            $answer = $mcq->getAnswer();
            $choice = $_POST['choice'];
            $mcqAnswer = ($answer == ($choice+1));
        }

        $this->showChapter($mcqAnswer);
    }

    public function changeChapter(int $chapterId) : void{
        $this->hero->changeChapter($chapterId);
        $this->showChapter();
    }

    private function getChapter(): Chapter{
        return $this->hero->getCurrentChapter();
    }

}