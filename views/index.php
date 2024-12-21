<?php
require '../controllers/HeroController.php';

echo '<h1>LALA</h1>';


require '../config/dbconnection.php';

echo (($bdd->query("select cl_name from Class where cl_id = 1"))->fetch(PDO::FETCH_OBJ))->cl_name;

//echo " ". htmlspecialchars($currentHero['name']);  


/*
require '../config/dbconnection.php';
require '../controllers/HeroController.php';

$result = $bdd->query("SELECT cl_name FROM Class WHERE cl_id = 1");

if ($result) {
    $row = $result->fetch(PDO::FETCH_OBJ);
    if ($row) {
        print($row->cl_name);
    } else {
        echo "Aucune donnée trouvée.";
    }
} else {
    echo "Erreur dans la requête.";
}
*/

?>