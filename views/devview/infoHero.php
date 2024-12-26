<?php
    $class = "Unknown class";
    if($_SESSION['user']->getHero()->getClassHero() === 1){
        $class = "warrior";
    }elseif($_SESSION['user']->getHero()->getClassHero() === 2){
        $class = "Wizard";
    }elseif($_SESSION['user']->getHero()->getClassHero() === 3){
        $class = "Thief";
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>temp info hero</title>
</head>
<body>
    <h1>Info de votre héro : </h1>
    <ul>
        <li><img src="<?=htmlspecialchars($_SESSION['user']->getHero()->getImage()) ?>" alt="image correspondant au héro"></li>
        <li><?=htmlspecialchars($_SESSION['user']->getHero()->getName()) ?></li>
        <li><?=htmlspecialchars($_SESSION['user']->getHero()->getBiography()) ?></li>
        <li><?=htmlspecialchars($class) ?></li>
    </ul>

</body>
</html>