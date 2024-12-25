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
    <h1>Chapter <?=$chapterId?></h1>
    <p><?=$content?></p>
    <img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$image?>" width=300px>
    <br>

    <?php if($mcq):?>
        <h2>Question</h2>
        <p><?=$mcqQuestion?></p>
        <h3>Choix:</h3>
        <form method="post" action="<?=constant('FULLURLROOTPATH'). '/chapter/' . $chapterId?>/mcqtest" style="<?= isset($mcqAnswer) ? ($mcqAnswer ? 'background-color: green;' : 'background-color: red;') : '' ?>">
            <?php foreach ($mcqChoices as $key => $choice):?>
                <input type="radio" name="choice" value="<?=$key?>"><?=$choice?><br>
            <?php endforeach;?>
            <input type="submit" value="Valider">
        </form>
    <?php elseif ($fight):?>
        <h2>Combat</h2>
        <p><?=$monster['name']?> (<?=$monster['pv']?> PV)</p>
        <p>Mana : <?=$monster['mana']?></p>
        <p>Initiative : <?=$monster['initiative']?></p>
        <p>XP : <?=$monster['xp']?></p>
    <?php endif;?>
    <br>

    <?php foreach ($nextChapterId as $id):?>
        <a href="<?=constant('FULLURLROOTPATH'). '/chapter/' . $id?>">
            <button>Chapter <?=$id?></button>
        </a>
    <?php endforeach;?>

    <br>
    <hr>
    <h2>Hero info</h2>
    <p>PV : <?=$hero['pv']?></p>
    <p>Strength : <?=$hero['strength']?></p>
    <p>Initiative : <?=$hero['initiative']?></p>
    <?php if(isset($hero['mana'])):?>
        <p>Mana : <?=$hero['mana']?></p>
    <?php endif;?>
    <p>XP : <?=$hero['xp']?></p>
</body>
</html>