<?php

use dungeonxplorer\managers\ChapterManager;

class ChapterController{

    public function showChapter(int $id) : void{

        $chapter = ChapterManager::getInstance()->getChapter($id);
        echo '<pre>';
        print_r($chapter->getChapterEvent());
        echo '</pre>';

        exit;

        require dirname(__DIR__). DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'devview' . DIRECTORY_SEPARATOR . 'chapter.php';
    }

}