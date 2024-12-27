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

<body class="bg-[#1a1a1a] overflow-x-hidden">
    <?php include(__DIR__ . '/shared/header.php'); ?>

    <div class="flex flex-col items-center justify-center pb-12">
        <object id="inventory-object" title="Inventaire" data="<?= FULLURLROOTPATH ?>/book/inventory" type="text/html"
            class="absolute z-10 h-full w-full"></object>
        <div id="book" class="pointer-events-none z-0 mb-4 mt-4">
            <?php include(__DIR__ . "/booktest/StoryMode_Load.php"); ?>
        </div>
        <?php (new StatusBarController())->show(); ?>
    </div>

    <?php include( __DIR__ . '/shared/footer.php'); ?>
</body>

</html>