<?php
require dirname(__DIR__, ) . DIRECTORY_SEPARATOR . 'autoload.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include(__DIR__ . '/shared/head.php'); ?>
    <script>
        const FULLURLROOTPATH = "<?= FULLURLROOTPATH ?>";
    </script>
    <script defer src="<?= FULLURLROOTPATH ?>/public/script/popupinventory.js"></script>
    <script type="module" src="<?= FULLURLROOTPATH ?>/public/script/bookmanager.js"></script>
</head>

<body class="bg-[#1a1a1a] overflow-x-hidden">
    <?php include(__DIR__ . '/shared/header.php'); ?>

    <!-- Display the book -->

    <div class="flex flex-col items-center justify-center mb-12">
        <object id="inventory-object" title="Inventaire" data="<?= FULLURLROOTPATH ?>/book/inventory" type="text/html"
            class="absolute z-10 h-full w-full"></object>
        <div id="book" class="pointer-events-none z-0 mb-4 mt-4 max-[615px]:rotate-90 max-[540px]:my-10">
            <?php include(__DIR__ . "/booktest/StoryMode_Load.php"); ?>
        </div>
        <?php (new StatusBarController())->show(); ?>
    </div>

    <?php include(__DIR__ . '/shared/footer.php'); ?>
</body>

</html>