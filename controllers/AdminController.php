<?php session_start();

use dungeonxplorer\managers\AdminManager;
use dungeonxplorer\managers\ItemManager;

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


    public function deleteAdventure($userID){
        AdminManager::getInstance()->deleteAdventure($userID);
        header("Location: " . FULLURLROOTPATH . "/admin");
    }

    public function deleteCharacter($userID){
        AdminManager::getInstance()->deleteCharacter($userID);
        header("Location: " . FULLURLROOTPATH . "/admin");
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
            $itemTable =  AdminManager::getInstance()->getAllItemInformation();
            require dirname(__DIR__) . "/views/admin_manageItem.php";
        }else{
            header("Location: " . FULLURLROOTPATH . "/error403");
        }
    }

    public function deleteItem(int $itemID){
        AdminManager::getInstance()->deleteItem($itemID);
        header("Location: " . FULLURLROOTPATH . "/adminItem");
    }

    public function modifyItem(int $itemID){
        $errors = [];

        var_dump($_POST);
        $name = $_POST["name"] ?? null;
        $description = $_POST["desc"] ?? null;
        $poids = $_POST["poids"] ?? null;
        $nbMax = $_POST["nbMax"] ?? null;

        /*// Can't retrieve checkbox value
        $equipable = $_POST["equip"];
        $armure = $_POST["armure"];
        */
        $equipable = 0; 
        $armure = 0; 
        if(isset($_POST["equip"])){
            $equipable = 1;
        }

        if(isset($_POST["armure"])){
            $armure = 1; 
        }

        $nomEffet = $_POST["nomEffet"] ?? null;
        $valEffet = $_POST["valEffet"] ?? null;
        $coutMana = $_POST["coutMana"] ?? null;
        $valProtection = $_POST["valProtection"] ?? null;
        $nbDegat = $_POST["nbDegat"] ?? null;
        $image = $_POST["image"] ?? null; 

        if(empty($name))
            $errors[] = "Vous devez saisir un nom à l'item !";
        if(empty($description))
            $errors[] = "Vous devez saisir une description à cet item!!";
        if(empty($poids))
            $errors[] = "Vous devez saisir un poids à cet item !!";
        
        if(empty($nbMax))
            $errors[] = "Vous devez saisir une capacité max possible de cet item !";
        if(empty($valProtection))
            $errors[] = "Vous devez saisir une valeur de protection de cet item !!";
        if(empty($nbDegat))
            $errors[] = "Vous devez saisir un nombre de dégar de cet item !!";
        if(empty($image))
            $errors[] = "Vous devez saisir une image pour cet item !!";
    
        if(empty($errors)){
            echo "Il y a pas d'erreurs !!";
            ItemManager::getInstance()->modifyItem( $itemID, $name, $description, $poids, $nbMax, $equipable, $armure, $nomEffet, $valEffet, $coutMana, $valProtection, $nbDegat, $image);
        }else{
            foreach($errors as $error){
                echo $error . "<br>";
            }
            echo "Il y a des erreurs !!";
        }
        
    }



    public function showManageLevel(){
        if($_SESSION['user']->isTheUserAnAdmin()){
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

