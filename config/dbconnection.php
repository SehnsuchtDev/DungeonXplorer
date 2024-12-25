<?php

class Dbconnection{

    private static $bdd;

    public static function getConnection() : PDO {
        if(!isset(Dbconnection::$bdd))
            Dbconnection::connection();
        return Dbconnection::$bdd; 
    }

    private function __construct(){}

    private static function connection(){
        $env = parse_ini_file(dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env');

        try
        {
            Dbconnection::$bdd = new PDO('mysql:host='. $env["DB_HOST"] . ';dbname='. $env["DB_NAME"] . ';charset=utf8', $env["DB_USER"], $env["DB_PASS"]);
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }


}