<?php
    require dirname(__DIR__,) . DIRECTORY_SEPARATOR . 'autoload.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include(__DIR__ .'/shared/head.php'); ?>
    <script defer src="<?= FULLURLROOTPATH ?>/public/script/popupinventory.js"></script>
    <script type="module" src="<?= FULLURLROOTPATH ?>/public/script/bookmanager.js"></script>
</head>

<body class="bg-[#1a1a1a]">
    <?php include(__DIR__ . '/shared/header.php'); ?>

    <div class="flex flex-col items-center justify-center mb-12">
        <object id="inventory-object" title="Inventaire" data="<?= FULLURLROOTPATH ?>/popupinventory.php" type="text/html"
            class="absolute z-10 h-full w-full"></object>
        <div id="book" class="pointer-events-none z-0 mb-4 mt-4">
            <?php include(__DIR__ . "/booktest/StoryMode_Load.php"); ?>
        </div>
        <?php //include(__DIR__ . "/shared/hero_data.php"); ?>
        <?php (new StatusBarController())->show(); ?>
        <!--<object id="statusbar" title="Barre d'info sur le hero" data="<?= FULLURLROOTPATH ?>/book/statusbar" type="text/html" class="w-full h-[8vh]"></object>-->
    </div>

    <?php include( __DIR__ . '/shared/footer.php'); ?>
</body>

</html>