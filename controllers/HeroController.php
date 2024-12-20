<?php

require '../config/dbconnection.php';

$currentHero = [
    'name' => ($bdd->query("select cl_name from Class where cl_id = 1"))->fetch(PDO::FETCH_OBJ)
];

?>