<?php

/**
 * Database Connection Class
 * Provides a connection to the database using PDO.
 */
class Dbconnection
{

    private static $bdd;

    /**
     * Creates a new connection if one does not already exist and returns it.
     */
    public static function getConnection(): PDO
    {
        if (!isset(Dbconnection::$bdd))
            Dbconnection::connection();
        return Dbconnection::$bdd;
    }

    private function __construct()
    {
    }

    /**
     * Establishes a connection to the database.
     */
    private static function connection()
    {
        $env = parse_ini_file(dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env');

        try {
            Dbconnection::$bdd = new PDO('mysql:host=' . $env["DB_HOST"] . ';dbname=' . $env["DB_NAME"] . ';charset=utf8', $env["DB_USER"], $env["DB_PASS"]);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }


}