<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chapter dev view</title>
</head>
<body>
    <h1>Chapter title</h1>
    <p><?=$chapter->getContent();?></p>
    <pre>
        <?php var_dump($chapter);?>
    </pre>
    <img src="" alt=""/>
</body>
</html>