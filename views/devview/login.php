<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login tempo</title>
</head>
<body>
    <form method="POST">
        <label for="email">email</label>
        <input type="text" name="email" id="email">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="connexion">
    </form>

    <br>

    <!-- Exemple de popup -->
    <?php if(isset($errors)) : ?>
        <p>
            POPUP:
            <?php if(empty($errors)): ?>
                connexion reussi
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