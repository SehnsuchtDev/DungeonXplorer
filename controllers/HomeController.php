<?php

class HomeController{

    public function show(){
        require dirname(__DIR__) . "/views/index.php";
    }

}