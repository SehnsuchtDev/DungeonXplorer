<?php

namespace dungeonxplorer\account;

use Dbconnection;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\managers\HeroManager;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';


class User{

    private int $id;
    private string $name = "";
    private string $email = "";
    private bool $isAdmin = false;  
    private ?Hero $hero = null;

    public static function getUserById($userID){
        $bdd = Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT us_username, us_email,us_password, us_id, he_id FROM User WHERE us_id=:id");

        $stmt->bindParam(':id',$userID);
        $stmt->execute();

        if($stmt->rowCount() !== 1)
            throw new \InvalidArgumentException("User not found",0);

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        $res= $stmt->fetch();

        $user = new self();
        $user->name = $res['us_username'];
        $user->email = $res['us_email'];
        $user->id = $res['us_id'];

        if(isset($res['he_id']))
            $user->hero = HeroManager::getInstance()->getHero($res['he_id']);


        return $user;

    }

   
    private static function exists(string $email, string $name):bool{
        $bdd = Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT count(*) as nb FROM User WHERE us_email=:email OR us_username=:username");
        $stmt->bindParam(':username',$name);
        $stmt->bindParam(':email',$email);
        $stmt->execute();

        return ($stmt->fetch()['nb'] !== 0);
    }

    public static function createUser(string $name,string $email,string $password): self{

        if(self::exists($email,$name))
            throw new \InvalidArgumentException("User already exists");

        $bdd = Dbconnection::getConnection();
        
        $hash_pass = password_hash($password,PASSWORD_ARGON2I);
        
        $stmt = $bdd->prepare("INSERT INTO User(us_username,us_email,us_password) VALUES(:username,:email,:password)");
        $stmt->bindParam(':username',$name);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',var: $hash_pass);

        $stmt->execute();
        
        $user = new self();
        $user->name = $name;
        $user->email = $email;
        $user->id = intval($bdd->lastInsertId());

        return $user;
    }

    public static function getUserWithPassCheck(string $email,string $password): User{
        
        $bdd = Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT us_username, us_email,us_password, us_id, he_id FROM User WHERE us_email=:email");

        $stmt->bindParam(':email',$email);
        $stmt->execute();

        if($stmt->rowCount() !== 1)
            throw new \InvalidArgumentException("User not found",0);

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        $res= $stmt->fetch();

        if(!password_verify($password,$res['us_password']))
            throw new \InvalidArgumentException("Wrong password",1);

        $user = new self();
        $user->name = $res['us_username'];
        $user->email = $res['us_email'];
        $user->id = $res['us_id'];

        if(isset($res['he_id']))
            $user->hero = HeroManager::getInstance()->getHero($res['he_id']);

        return $user;
    }


    public function getUserId() : int{
        return $this->id;
    }

    public function setHero(Hero $newHero){
        $this->hero = $newHero;
      
        $bdd = Dbconnection::getConnection();

        $stmt = $bdd->prepare("update User set he_id = :idOfMyHero where us_id = :idOfMyUser");


        $userId = $this->hero->getId();

        $stmt->bindParam(':idOfMyHero',$userId);

        $stmt->bindParam(':idOfMyUser',$this->id);

        $stmt->execute();
        //$result = $stmt->fetch(\PDO::FETCH_OBJ);        //result of the query
    }


    public function getHero() : ?Hero{
        return $this->hero;
    }

    public function getName(){
        return $this->name;
    }
        
    public function getEmail(){
        return $this->email;
    }


    public function delete(){

        // Allows you to delete a hero by account id 
        HeroManager::getInstance()->deleteHero($this->id);

        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("DELETE FROM User where us_id = :us_id");

        $stmt->bindParam(':us_id',$this->id);
        
        $stmt->execute();
    }


    public function updatePassword($newpassword){

        $bdd = \Dbconnection::getConnection();

        $password = password_hash($newpassword, PASSWORD_ARGON2I);

        $stmt = $bdd->prepare("UPDATE User set us_password = :us_password where us_id = :us_id");

        $stmt->bindParam(':us_id',$this->id);
        $stmt->bindParam(':us_password',$password);
        
        $stmt->execute();
    }

    public function updateUsername($newUsername){
        
        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("UPDATE User set us_username = :us_username where us_id = :us_id");

        $stmt->bindParam(':us_id',$this->id);
        $stmt->bindParam(':us_username',$newUsername);
        
        $stmt->execute();

        $this->name = $newUsername;
    }

    public function updateMailAddress($newEMail){

        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("UPDATE User set us_email = :us_email where us_id = :us_id");

        $stmt->bindParam(':us_id',$this->id);
        $stmt->bindParam(':us_email',$newEMail);
        
        $stmt->execute();

        $this->email = $newEMail;
    }

    public function isTheUserAnAdmin(){
        return true;
        //return $this->isAdmin;
    }

}

?>