<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('./shared/head.php'); ?>
    <script defer src="../public/script/popupinventory.js"></script>
    <script type="module" src="../public/script/bookmanager.js"></script>
</head>

<body class="bg-[#1a1a1a]">
    <?php include('./shared/header.php'); ?>

    <div class="flex flex-col items-center justify-center mb-12">
        <object id="inventory-object" title="Inventaire" data="./popupinventory.php" type="text/html"
            class="absolute z-10 h-full w-full"></object>
        <div id="book" class="pointer-events-none z-0 mb-4 mt-4 
            max-[615px]:rotate-90"> <!-- max-w-6 -->
            <?php include "./booktest/StoryMode_Load.php"; ?>
        </div>
        <?php include "./shared/hero_data.php"; ?>
    </div>

    <?php include "./shared/footer.php"; ?>
</body>

</html>