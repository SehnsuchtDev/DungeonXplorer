<?php

namespace dungeonxplorer\managers;


use dungeonxplorer\hero\Level;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';

class LevelManager
{
    private static self $instance;

    private function __construct(){}

    public static function getInstance() : self {
        if(!isset(self::$instance))
            self::$instance = new self();
        return self::$instance;
    }

    public function getLevel(int $levelId) : ?Level {
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT * FROM Level WHERE le_id = ?;");
        $stmt->execute([$levelId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        $res = $stmt->fetch();

        $level = new Level();
        $level->hydrate($res);

        return $level;
    }

    public function getLevelWithXp(int $classHero, int $xp) : ?Level {
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT * FROM Level
                                         WHERE cl_id = :cl_id
                                         AND le_required_xp <= :le_required_xp
                                         ORDER BY le_required_xp desc
                                         LIMIT 1;");
        $stmt->bindParam(":cl_id", $classHero);
        $stmt->bindParam(":le_required_xp", $xp);
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        $res = $stmt->fetch();



        $level = new Level($classHero,1,0,[]);
        if($res)
            $level->hydrate($res);

        return $level;
    }

}
