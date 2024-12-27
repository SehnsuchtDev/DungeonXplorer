<?php

use dungeonxplorer\account\User;

require_once __DIR__ . '/../autoload.php';

class LoginController
{

    /**
     * Displays the login page.
     */
    public function show(): void
    {
        $seed = rand();

        if (isset($_SESSION['user'])) {
            $errors = [];
        }
        require __DIR__ . '/../views/connection.php';
    }

    /**
     * Handles the login process.
     */
    public function login(): void
    {

        $seed = rand();

        $errors = [];

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Vous devez saisir un email valide !";
        }

        if (empty($password)) {
            $errors[] = "Vous devez saisir un mot de passe !";
        }


        if (empty($errors)) {
            try {
                $_SESSION['user'] = User::getUserWithPassCheck($email, $password);
            } catch (\InvalidArgumentException $e) {
                if ($e->getCode() === 1) {
                    $errors[] = "Votre password est incorrecte !";
                } else {
                    $errors[] = "L'utilisateur n'existe pas";
                }
            }
        }
        require __DIR__ . '/../views/connection.php';
    }

}