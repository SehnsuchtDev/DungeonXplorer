<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include(__DIR__ . '/shared/head.php'); ?>
</head>

<body class="bg-[#1a1a1a]">
    <!-- HEADER -->
    <?php include(__DIR__ . '/shared/header.php'); ?>

    <!-- error 403 page -->

    <div class="place-self-center text-[#E5E5E5] m-20">
        <p class="text-center text-3xl m-5 font-['Pirata_One']">HALTE!</p>
        <p class="text-center text-xl m-5 font-['Roboto']">Malheureusement, vous n'avez pas accès à cette page... Partez
            avant de vous faire attraper!</p>
        <img src="<?= FULLURLROOTPATH ?>/public/assets/Forest Spirit.jpg" alt="a giant spider" width="400" height="341"
            title="giant spider" class="m-5 justify-self-center" />
    </div>

    </main>

    <?php include(__DIR__ . '/shared/footer.php'); ?>

</body>

</html>