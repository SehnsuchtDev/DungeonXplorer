<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero tempo</title>
</head>
<body>
    
    <form method="post">
        <label for="name">Name : </label>
        <input type="text" name="name">
        <label for="biography">Biography : </label>
        <input type="text" name="biography">
        <label for="class">Class of your hero :</label>
        <select name="class">
            <option value="1">Warrior</option>
            <option value="2">Wizzard</option>
            <option value="3">Thief</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Confirm">
    </form>

    <?php if(isset($errors)) : ?>
        <p> 
            POPUP:
            <?php if(empty($errors)) : ?>
                création réussi
            <?php else: ?>
                <ul>
                    <?php foreach($errors as $e): ?>
                        <li><?=$e?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
        </p>
    <?php endif ?>
</body>
</html>