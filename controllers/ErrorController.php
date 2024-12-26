<?php

class ErrorController{

    public function show(){
        require dirname(__DIR__) . "/views/error404.php";
    }

}