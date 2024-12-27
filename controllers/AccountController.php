<?php use dungeonxplorer\managers\HeroManager;


require_once __DIR__ . '/../autoload.php';

/**
 * AccountController class
 * Manages user account actions (viewing, deleting, and modifying).
 */
class AccountController
{

    /**
     * Display the account page if the user is authenticated.
     * Redirects to a 403 error page otherwise.
     */
    public function show()
    {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $name = $user->getName();
            $email = $user->getEmail();


            $hero = $user->getHero();
            if ($hero != null) {
                $heroName = $user->getHero()->getName();
            } else {
                $heroName = "L'héros n'est pas encore crée";
            }

            require dirname(__DIR__) . "/views/account.php";
        } else {
            header("location:" . FULLURLROOTPATH . "/error403");
        }
    }

    /**
     * Delete the authenticated user's account and session.
     * Redirects to the homepage or a 403 error page if unauthenticated.
     */
    public function delete()
    {
        if (isset($_SESSION["user"])) {
            $user = $_SESSION['user'];
            session_destroy();

            $user->delete();
            unset($user);

            header("location:" . FULLURLROOTPATH);
        } else {
            header("location:" . FULLURLROOTPATH . "/error403");
        }
    }

    /**
     * Show the account modification page for the authenticated user.
     * Redirects to a 403 error page if unauthenticated.
     */
    public function showModify()
    {
        if (isset($_SESSION["user"])) {
            $username = $_SESSION["user"]->getName();
            require dirname(__DIR__) . "/views/account_modify.php";
        } else {
            header("location:" . FULLURLROOTPATH . "/error403");
        }
    }

    /**
     * Update the user's account details (password or username).
     * Redirects to the login page after changes or to a 403 error page if unauthenticated.
     */
    public function modify()
    {

        if (isset($_SESSION["user"])) {
            $user = $_SESSION['user'];

            $nouveauMDP = $_POST['new-password'];
            $nouveauUsername = $_POST['profile-name'];

            session_destroy();

            if ($nouveauMDP != '') {
                $user->updatePassword($nouveauMDP);
            }
            if ($nouveauUsername != '') {
                $user->updateUsername($nouveauUsername);
            }

            header("location:" . FULLURLROOTPATH . "/book");
        } else {
            header("location:" . FULLURLROOTPATH . "/error403");
        }

    }

    public function deleteHero(){
        $user = $_SESSION['user'];
        $user->setHero(null);

        HeroManager::getInstance()->deleteHero($user->getUserId());

        header("location:".FULLURLROOTPATH.'/book');
    }

}

?>