<?php session_start();

use dungeonxplorer\managers\AdminManager;

class AdminController{

    public function show(){
        if($_SESSION['user']->isTheUserAnAdmin()){
            $userTable = AdminManager::getInstance()->getAllUserInformation();
            require dirname(__DIR__) . "/views/admin_manageAccount.php";
        }else{
            header("Location: " . FULLURLROOTPATH . "/error403");
        }
    }

    public function deleteUser(int $id){
        AdminManager::getInstance()->deleteAccount($id);
        header("Location: " . FULLURLROOTPATH . "/admin");
    }

    public function modifyUser(int $userID){
        
        $errors = [];

        $username = $_POST['pseudo'] ?? '';
        $email = $_POST['mail'] ?? '';
        $password = $_POST['motDePasse'] ?? '';

        if(empty($username))
            $errors[] = "Vous devez saisir un pseudo !";

        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
            $errors[] = "Vous devez saisir un email valide !";
        
        if(empty($errors)){
            try{
                AdminManager::getInstance()->modifyAccount($userID, $email, $username);
                if(!empty($password))
                    AdminManager::getInstance()->modifyPasswordAccount($userID, $password);

            }catch(\InvalidArgumentException){
                $errors[] = "L'utilisateur n'existe pas !";
            }
        }

        $userTable = AdminManager::getInstance()->getAllUserInformation();
        require dirname(__DIR__) . "/views/admin_manageAccount.php";
    }


    public function modifyLevel($levelID){

        echo "oui";
        echo $levelID;


        if(isset($_POST['numero'])){
            $numero = $_POST['numero'];
        }
        else{
            $numero = '';
        }
        if(isset($_POST['xp'])){
            $xp = $_POST['xp'];
        }
        else{
            $xp = '';
        }
        if(isset($_POST['pvBonus'])){
            $pvBonus = $_POST['pvBonus'];
        }
        else{
            $pvBonus = '';
        }
        if(isset($_POST['mana'])){
            $mana = $_POST['mana'];
        }
        else{
            $mana = '';
        }
        if(isset($_POST['force'])){
            $force = $_POST['force'];
        }
        else{
            $force = '';
        }
        if(isset($_POST['initiative'])){
            $initiative = $_POST['initiative'];
        }
        else{
            $initiative = '';
        }


        AdminManager::getInstance()->updateLevel($levelID,$numero,$xp,$pvBonus,$mana,$force,$initiative);

        header("Location: " . FULLURLROOTPATH . "/adminLevel");

    }

    public function deleteLevel($levelId){
        AdminManager::getInstance()->deleteLevel($levelId);
        header("Location: " . FULLURLROOTPATH . "/adminLevel");
    }


    public function deleteAdventure($userID){
        AdminManager::getInstance()->deleteAdventure($userID);
        require dirname(__DIR__) . "/views/admin_manageAccount.php";
    }

    public function deleteCharacter($userID){
        AdminManager::getInstance()->deleteCharacter($userID);
        require dirname(__DIR__) . "/views/admin_manageAccount.php";
    }




    public function showManageChapter(){
        if($_SESSION['user']->isTheUserAnAdmin()){
            require dirname(__DIR__) . "/views/admin_manageChapter.php";
        }else{
            header("Location: " . FULLURLROOTPATH . "/error403");
        }
    }

    public function showManageItem(){
        if($_SESSION['user']->isTheUserAnAdmin()){
            require dirname(__DIR__) . "/views/admin_manageItem.php";
        }else{
            header("Location: " . FULLURLROOTPATH . "/error403");
        }
    }

    public function showManageLevel(){
        if($_SESSION['user']->isTheUserAnAdmin()){
            $level = AdminManager::getInstance()->getAllLevelInformation();
            require dirname(__DIR__) . "/views/admin_manageLevel.php";
        }else{
            header("Location: " . FULLURLROOTPATH . "/error403");
        }
    }
    
    public function showManageSpell(){
        if($_SESSION['user']->isTheUserAnAdmin()){
            require dirname(__DIR__) . "/views/admin_manageSpell.php";
        }else{
            header("Location: " . FULLURLROOTPATH . "/error403");
        }
    }


}

