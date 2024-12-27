<?php

namespace dungeonxplorer\account;

use Dbconnection;
use dungeonxplorer\hero\Hero;
use dungeonxplorer\managers\HeroManager;

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'autoload.php';


class User
{

    private $id;
    private string $name = "";
    private string $email = "";
    private ?bool $isAdmin = null;
    private ?Hero $hero = null;


    /**
     * Check if a user with a given email or name already exists in the database
     */
    private static function exists(string $email, string $name): bool
    {
        $bdd = Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT count(*) as nb FROM User WHERE us_email=:email OR us_username=:username");
        $stmt->bindParam(':username', $name);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        return ($stmt->fetch()['nb'] !== 0);

    }

    /**
     * Create a new user
     */
    public static function createUser(string $name, string $email, string $password): self
    {

        if (self::exists($email, $name))
            throw new \InvalidArgumentException("User already exists");

        $bdd = Dbconnection::getConnection();

        $hash_pass = password_hash($password, PASSWORD_ARGON2I);

        $stmt = $bdd->prepare("INSERT INTO User(us_username,us_email,us_password) VALUES(:username,:email,:password)");
        $stmt->bindParam(':username', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', var: $hash_pass);

        $stmt->execute();

        $user = new self();
        $user->name = $name;
        $user->email = $email;
        $user->id = intval($bdd->lastInsertId());

        return $user;
    }

    /**
     * Get a user with a password check
     */
    public static function getUserWithPassCheck(string $email, string $password): User
    {

        $bdd = Dbconnection::getConnection();

        $stmt = $bdd->prepare("SELECT us_username, us_email,us_password, us_id, he_id FROM User WHERE us_email=:email");

        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() !== 1)
            throw new \InvalidArgumentException("User not found", 0);

        $stmt->setFetchMode(\PDO::FETCH_ASSOC);

        $res = $stmt->fetch();

        if (!password_verify($password, $res['us_password']))
            throw new \InvalidArgumentException("Wrong password", 1);

        $user = new self();
        $user->name = $res['us_username'];
        $user->email = $res['us_email'];
        $user->id = $res['us_id'];

        if (isset($res['he_id']))
            $user->hero = HeroManager::getInstance()->getHero($res['he_id']);


        return $user;

    }

    /**
     * Get the user's ID
     */
    public function getUserId()
    {
        return $this->id;
    }

    /**
     * Set a hero for the user
     */
    public function setHero(?Hero $newHero)
    {
        $this->hero = $newHero;
        if ($newHero === null)
            return;

        $bdd = Dbconnection::getConnection();

        $stmt = $bdd->prepare("update User set he_id = :idOfMyHero where us_id = :idOfMyUser");


        $userId = $this->hero->getId();

        $stmt->bindParam(':idOfMyHero', $userId);

        $stmt->bindParam(':idOfMyUser', $this->id);

        $stmt->execute();
    }

    /**
     * Get the hero associated with the user
     */
    public function getHero(): ?Hero
    {
        return $this->hero;
    }

    /**
     * Get the user's name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the user's email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Delete the user from the database
     */
    public function delete()
    {

        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("DELETE FROM User where us_id = :us_id");

        $stmt->bindParam(':us_id', $this->id);

        $stmt->execute();
    }

    /**
     * Update the user's password
     */
    public function updatePassword($newpassword)
    {

        $bdd = \Dbconnection::getConnection();

        $password = password_hash($newpassword, PASSWORD_ARGON2I);

        $stmt = $bdd->prepare("UPDATE User set us_password = :us_password where us_id = :us_id");

        $stmt->bindParam(':us_id', $this->id);
        $stmt->bindParam(':us_password', $password);

        $stmt->execute();

    }

    /**
     * Update the user's username
     */
    public function updateUsername($newUsername)
    {

        $bdd = \Dbconnection::getConnection();

        $stmt = $bdd->prepare("UPDATE User set us_username = :us_username where us_id = :us_id");

        $stmt->bindParam(':us_id', $this->id);
        $stmt->bindParam(':us_username', $newUsername);

        $stmt->execute();

        $this->name = $newUsername;
    }

    public function isTheUserAnAdmin(): bool
    {
        if ($this->isAdmin === null) {
            $bdd = \Dbconnection::getConnection();

            $stmt = $bdd->prepare("SELECT count(*) as nb FROM Administrateur WHERE us_id = ?;");
            $stmt->execute([$this->id]);

            $this->isAdmin = $stmt->fetch()['nb'] == 1;
        }
        return $this->isAdmin;
    }

}
