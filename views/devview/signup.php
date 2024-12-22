<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign tempo</title>
</head>
<body>
    <form method="POST">
        <label for="username">pseudo</label>
        <input type="text" name="username" id="username">
        <label for="email">email</label>
        <input type="text" name="email" id="email">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <label for="confirm_password">password confirm</label>
        <input type="password" name="confirm_password" id="confirm_password">
        <input type="submit" value="inscription">
    </form>

    <br>

    <!-- Exemple de popup -->
    <?php if(isset($errors)) : ?>
        <p>
            POPUP:
            <?php if(empty($errors)): ?>
                inscription reussi
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