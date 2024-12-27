<?php

namespace dungeonxplorer\managers;

use dungeonxplorer\item\potion\Effect;
use dungeonxplorer\loot\gain\GainEffect;
use dungeonxplorer\loot\gain\GainItem;
use dungeonxplorer\loot\gain\GainPiece;
use dungeonxplorer\loot\gain\GainSpell;
use dungeonxplorer\loot\Loot;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';

class LootManager
{
    private static self $instance;

    private function __construct(){}

    public static function getInstance() : self {
        if(!isset(self::$instance))
            self::$instance = new self();
        return self::$instance;
    }

    public function getLoot(int $lootId) : ?Loot {
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT * FROM Loot WHERE lo_id = ?;");
        $stmt->execute([$lootId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        if($stmt->rowCount() == 0){
            return null;
        }

        $res = $stmt->fetchAll();

        $loot = new Loot();
        foreach($res as $row){
            if(isset($row['it_id'],$row['lo_quantity'])){
                $gain = new GainItem(null,$row['lo_quantity']);
                $gain->it_id = $row['it_id'];
            }elseif(isset($row['lo_effet'],$row['lo_quantity'])){
                $gain = new GainEffect(Effect::getEffect($row['lo_effet']),$row['lo_quantity']);
            }elseif(isset($row['lo_piece'])) {
                $gain = new GainPiece($row['lo_piece']);
            }elseif(isset($row['sp_id'])){
                $spell = SpellManager::getInstance()->getSpell($row['sp_id']);
                $gain = new GainSpell($spell);
            }else
                throw new \InvalidArgumentException('Loot not found');
            $loot->addGain($gain);
        }

        return $loot;
    }

}
