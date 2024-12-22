<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('./shared/head.php'); ?>
    <script type="module" src="../public/script/bookmanager.js"></script>
</head>

<body class="bg-[#1a1a1a]">
    <?php include('./shared/header.php'); ?>

    <div id="book" class="pointer-events-none z-0">
        <?php include "./booktest/StoryMode_Load.php"; ?>
    </div>
    <?php include "./shared/footer.php"; ?>
</body>

</html>