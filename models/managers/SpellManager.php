<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\hero\class\magic\Spell;

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'autoload.php';

class SpellManager{
    private static self $instance;

    private function __construct(){}

    public static function getInstance() : self {
        if(!isset(self::$instance))
            self::$instance = new self();
        return self::$instance;
    }

    public function getSpellsWithHeroId(int $heroId) : ?array {
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT sp_name as name,sp_manacost as manaCost,sp_damage as damage FROM Spell JOIN HeroSpell USING (sp_id) WHERE he_id = ?;");
        $stmt->execute([$heroId]);
        $stmt->setFetchMode(\PDO::FETCH_CLASS, Spell::class);

        return $stmt->fetchAll();
    }

}
