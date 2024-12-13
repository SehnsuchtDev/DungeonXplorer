<?php

$_ENV = parse_ini_file("../.env");

try
{
    $bdd = new PDO('mysql:host='. $_ENV["DB_HOST"] . ';dbname='. $_ENV["DB_NAME"] . ';charset=utf8', $_ENV["DB_USER"], $_ENV["DB_PASS"]);
}

// Gestion des erreurs
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
