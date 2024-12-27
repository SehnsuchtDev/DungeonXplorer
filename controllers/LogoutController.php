<?php

require_once __DIR__ . '/../autoload.php';

class LogoutController{
  

    public function logout(){
        session_destroy();
        header("location:".FULLURLROOTPATH);
    }

}