<?php session_start();

require_once __DIR__ . '/../autoload.php';

class AccountController{
    public function show(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $name = $user->getName();
            $email = $user->getEmail();

            
            $hero = $user->getHero();
            if($hero != null){
                $heroName = $user->getHero()->getName();
            }
            else{
                $heroName = "L'héros n'est pas encore crée";
            }
            
            require dirname(__DIR__) . "/views/account.php";
        }
        else{
            header("location:".FULLURLROOTPATH."/error403");
        }
    }


    public function delete(){
        if(isset($_SESSION["user"])){
        $user = $_SESSION['user'];
        session_destroy();

        $user->delete();
        unset( $user );

        header("location:".FULLURLROOTPATH);
        }
        else{
            header("location:".FULLURLROOTPATH."/error403");
        }
    }

    public function showModify(){
        if(isset($_SESSION["user"])){
            $username = $_SESSION["user"]->getName();
            require dirname(__DIR__) . "/views/account_modify.php";
        }
        else{
            header("location:".FULLURLROOTPATH."/error403");
        }
    }

    public function modify(){

        if(isset($_SESSION["user"])){
            $user = $_SESSION['user'];

            $nouveauMDP = $_POST['new-password'];
            $nouveauUsername = $_POST['profile-name'];

            session_destroy();

            if($nouveauMDP != ''){
                $user->updatePassword($nouveauMDP);
            }
            if($nouveauUsername != ''){
                $user->updateUsername($nouveauUsername);
            }

            header("location:".FULLURLROOTPATH."/login");
        }
        else{
            header("location:".FULLURLROOTPATH."/error403");
        }

    }

}

?>