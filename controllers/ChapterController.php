<?php

class ChapterController{

    public function showChapter(int $id) : void{
        require dirname(__DIR__). DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'devview' . DIRECTORY_SEPARATOR . 'chapter.php';
    }

}