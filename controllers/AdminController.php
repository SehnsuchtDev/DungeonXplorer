<?php

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

        $name = $_POST["name"] ?? "";
        $description = $_POST["desc"] ?? "";
        $poids = intval($_POST["poids"]) ?? 0;
        $nbMax = intval($_POST["nbMax"]) ?? 0;

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
        $valEffet = intval($_POST["valEffet"]) ?? null;
        $coutMana = intval($_POST["coutMana"]) ?? null;
        $valProtection = intval($_POST["valProtection"]) ?? null;
        $nbDegat = intval($_POST["nbDegat"]) ?? null;

        if(empty($name))
            $errors[] = "Vous devez saisir un nom à l'item !";
        if(empty($description))
            $errors[] = "Vous devez saisir une description à cet item!!";
        if(empty($poids))
            $errors[] = "Vous devez saisir un poids à cet item !!";
        if(empty($nbMax))
            $errors[] = "Vous devez saisir une capacité max possible de cet item !";
        if(empty($errors)){
            ItemManager::getInstance()->modifyItem( $itemID, $name, $description, $poids, $nbMax, $equipable, $armure, $nomEffet, $valEffet, $coutMana, $valProtection, $nbDegat);
        }
        header("Location: " . FULLURLROOTPATH . "/adminItem");
    }

    public function addItem(){

        $errors = [];

        $name = $_POST["name"] ?? "";
        $description = $_POST["desc"] ?? "";
        $poids = intval($_POST["poids"]) ?? 0;
        $nbMax = intval($_POST["nbMax"]) ?? 0;

        $equipable = 0; 
        $armure = 0; 
        if(isset($_POST["equip"])){
            $equipable = 1;
        }

        if(isset($_POST["armure"])){
            $armure = 1; 
        }

        $nomEffet = $_POST["nomEffet"] ?? null;
        $valEffet = intval($_POST["valEffet"]) ?? null;
        $coutMana = intval($_POST["coutMana"]) ?? null;
        $valProtection = intval($_POST["valProtection"]) ?? null;
        $nbDegat = intval($_POST["nbDegat"]) ?? null;

        $image = $_POST["image"] ?? null;

        if(empty($name))
            $errors[] = "Vous devez saisir un nom à l'item !";
        if(empty($description))
            $errors[] = "Vous devez saisir une description à cet item!!";
        if(empty($poids))
            $errors[] = "Vous devez saisir un poids à cet item !!";
        if(empty($nbMax))
            $errors[] = "Vous devez saisir une capacité max possible de cet item !";
        if(empty($image)){
            $errors[] = "Vous devez saisir une photo de cet item !";
        }
    
        if(empty($errors)){
            ItemManager::getInstance()->addItem( $name, $description, $poids, $nbMax, $equipable, $armure, $nomEffet, $valEffet, $coutMana, $valProtection, $nbDegat, $image);
        }
        $itemTable =  AdminManager::getInstance()->getAllItemInformation();
        require dirname(__DIR__) . "/views/admin_manageItem.php";
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
            $spellTable =  AdminManager::getInstance()->getAllSpellInformation();
            require dirname(__DIR__) . "/views/admin_manageSpell.php";
        }else{
            header("Location: " . FULLURLROOTPATH . "/error403");
        }
    }

    public function deleteSpell($spellID){
        AdminManager::getInstance()->deleteSpell($spellID);
        header("Location: " . FULLURLROOTPATH . "/adminSpell");
    }

    public function modifySpell($spellID){
        $name = $_POST["name"];
        $manaCost = $_POST["manaCost"];
        $damage = $_POST["damage"];
        
        AdminManager::getInstance()->modifySpell($spellID, $name, $manaCost, $damage);
        header("Location: " . FULLURLROOTPATH . "/adminSpell");
    }



}

