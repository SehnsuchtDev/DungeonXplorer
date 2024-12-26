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
        <form method="post" action="<?=constant('FULLURLROOTPATH')?>/chapter/mcqtest" style="<?= isset($mcqAnswer) ? ($mcqAnswer ? 'background-color: green;' : 'background-color: red;') : '' ?>">
            <?php foreach ($mcqChoices as $key => $choice):?>
                <input type="radio" name="choice" value="<?=$key?>"><?=$choice?><br>
            <?php endforeach;?>
            <input type="submit" value="Valider">
        </form>
    <?php elseif ($fight):?>
        <h2>Combat</h2>
        <p><?=$monster['name']?> (<?=$monster['pv']?> PV)</p>
        <p>Force : <?=$monster['strength']?></p>
        <p>Mana : <?=$monster['mana']?></p>
        <p>Initiative : <?=$monster['initiative']?></p>
        <p>XP : <?=$monster['xp']?></p>
        <a href="<?=constant('FULLURLROOTPATH')?>/chapter/fight"><button <?= $eventIsDone ? 'disabled' : '' ?> ><?=$fightStatus?></button></a>
        <br><br>
    <?php endif;?>
    <br>

    <?php foreach ($nextChapterId as $id):?>
        <a href="<?=constant('FULLURLROOTPATH'). '/chapter/' . $id?>">
            <button <?= $eventIsDone ? '' : 'disabled' ?>>Chapter <?=$id?></button>
        </a>
    <?php endforeach;?>

    <br>
    <hr>
    <h2>Hero info <?=$hero['class']?></h2>
    <p>PV : <?=$hero['pv']?></p>
    <p>Strength : <?=$hero['strength']?></p>
    <p>Initiative : <?=$hero['initiative']?></p>
    <?php if(isset($hero['mana'])):?>
        <p>Mana : <?=$hero['mana']?></p>
    <?php endif;?>
    <p>Protection : <?=$hero['armor']?></p>
    <p>XP : <?=$hero['xp']?></p>
    <?php if(isset($primaryWeapon)):?>
        <p>Arme principale : <?=$primaryWeapon?></p>
    <?php endif;?>
    <?php if(isset($secondaryWeapon)):?>
        <p>Arme secondaire : <?=$secondaryWeapon?></p>
    <?php endif;?>
    <?php if(isset($armor)):?>
        <p>Armure : <?=$armor?></p>
    <?php endif;?>

    <br>
    <hr>
    <h2>Inventory :</h2>
    <ul>
        <?php foreach ($items as $item):?>
            <li><img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$item['image']?>" width=75px>
                <?=$item['name']?> : <?=$item['quantity']?>
                <?php if ($item['usable']) :?>
                    <a href="<?=constant('FULLURLROOTPATH')?>/inventory/use/<?=$item['id']?>">Utiliser</a>
                <?php elseif ($item['handitem']) :?>
                    <a href="<?=constant('FULLURLROOTPATH')?>/inventory/equip/<?=$item['id']?>/primaryweapon">Equiper en Arme principale</a>
                    <a href="<?=constant('FULLURLROOTPATH')?>/inventory/equip/<?=$item['id']?>/secondaryweapon">Equiper en Arme secondaire</a>
                <?php elseif ($item['armor']) :?>
                    <a href="<?=constant('FULLURLROOTPATH')?>/inventory/equip/<?=$item['id']?>/armor">Equiper</a>
                <?php endif;?>
                <span style="color: red">  <a style="color: red" href="<?=constant('FULLURLROOTPATH')?>/inventory/drop/<?=$item['id']?>">Jetter</a></span>
            </li>
        <?php endforeach;?>
    </ul>
    <p>Purse <?=$purse?></p>
</body>
</html>