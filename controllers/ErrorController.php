<?php

class ErrorController{

    public function show(){
        require dirname(__DIR__) . "/views/error404.php";
    }

    public function show403(){
        require dirname(__DIR__) . "/views/error403.php";
    }

}