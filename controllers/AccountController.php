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
            header("location:".FULLURLROOTPATH."/error404");
        }
    }


    public function delete(){

        $user = $_SESSION['user'];
        session_destroy();

        $user->delete();
        unset( $user );

        header("location:".FULLURLROOTPATH);
    }

}

?>