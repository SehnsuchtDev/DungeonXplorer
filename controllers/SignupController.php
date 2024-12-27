<?php if (session_status() != PHP_SESSION_ACTIVE)
    session_start();

use dungeonxplorer\account\User;

require_once __DIR__ . '/../autoload.php';

class SignupController
{

    /**
     * Displays the signup form
     */
    public function show(): void
    {

        $seed = rand();
        if (isset($_SESSION['user'])) {
            $errors = [];
        }
        require __DIR__ . '/../views/signup.php';
    }

    /**
     * Handles the user signup process.
     * Validates the form data and creates a new user if validation passes.
     */
    public function signup(): void
    {

        $seed = rand();

        $errors = [];

        $username = $_POST['pseudo'] ?? '';
        $email = $_POST['mail'] ?? '';
        $password = $_POST['password'] ?? '';
        $password_confirm = $_POST['passwordconfirm'] ?? '';

        if (empty($username))
            $errors[] = "Vous devez saisir un pseudo !";

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors[] = "Vous devez saisir un email valide !";

        if (empty($password))
            $errors[] = "Vous devez saisir un mot de passe !";

        if (empty($password_confirm))
            $errors[] = "Vous devez confirmer votre mot de passe !";
        else if ($password !== $password_confirm)
            $errors[] = "Les mots de passe ne sont pas identique !";


        if (empty($errors)) {
            try {
                $_SESSION['user'] = User::createUser($username, $email, $password);
            } catch (\InvalidArgumentException) {
                $errors[] = "L'utilisateur existe déja !";
            }
        }

        require __DIR__ . '/../views/signup.php';
    }

}