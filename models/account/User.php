<?php

namespace dungeonxplorer\account;

use Dbconnection;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';

class User{

    //private $id;
    private $name = "";
    private $email = "";
    private $isAdmin = false;
    private $hero;


    private static function exists($email,$name):bool{
        $bdd = Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT count(*) as nb FROM User WHERE us_email=:email OR us_username=:username");
        $stmt->bindParam(':username',$name);
        $stmt->bindParam(':email',$email);
        $stmt->execute();

        return ($stmt->fetch()['nb'] !== 0);
        
    }

    public static function createUser($name,$email,$password): User{

        if(User::exists($email,$name))
            throw new \InvalidArgumentException("User already exists");

        $bdd = Dbconnection::getConnection();
        
        $hash_pwd = password_hash($password,PASSWORD_ARGON2I);
        
        $stmt = $bdd->prepare("INSERT INTO User(us_username,us_email,us_password) VALUES(:username,:email,:password)");
        $stmt->bindParam(':username',$name);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':password',var: $hash_pwd);

        $stmt->execute();
        
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        //$user->id = intval($bdd->lastInsertId());

        return $user;
    }
}

?>