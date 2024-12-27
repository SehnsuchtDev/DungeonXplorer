<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\chapter\Chapter;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'autoload.php';
class ChapterManager
{
    private static self $instance;

    private function __construct(){}

    public static function getInstance() : self {
        if(!isset(self::$instance))
            self::$instance = new self();
        return self::$instance;
    }

    public function getChapter(int $chapterId) : Chapter {
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT ch_content as content, ch_image as image,ch_id as chapterId,ce_id,lo_id FROM Chapter where ch_id = ?");
        $stmt->execute([$chapterId]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Chapter::class);
        return $stmt->fetch();
    }

}