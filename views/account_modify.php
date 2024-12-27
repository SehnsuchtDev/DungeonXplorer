<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include(__DIR__ . '/shared/head.php'); ?>
</head>

<body class="bg-[#1a1a1a]">
    <!-- HEADER -->
    <?php include(__DIR__ . '/shared/header.php'); ?>

    <!-- Display the current account informations with inputs -->
    <div
        class="bg-[rgba(46,46,46,0.80)] place-self-center max-w-[50em] rounded text-[#e5e5e5] font-['Roboto'] p-12 m-24 text-xl">
        <p class="font-['Pirata_One'] text-center"><?= $username ?></p>
        <br>
        <form method="POST" action="<?= FULLURLROOTPATH ?>/account/modify/validation">
            <div class="flex m-2">
                <label for="profile_name" class="text-[#C4975E]">Nouveau nom du profile : &nbsp;</label>
                <input type="text" placeholder="" id="profile_name" name="profile-name" class="rounded max-h-6">
            </div>
            <div class="flex m-2">
                <label for="new_password" class="text-[#C4975E]">Nouveau mot de passe : &nbsp;</label>
                <input type="password" placeholder="" id="new_password" name="new-password" class="rounded max-h-6">
            </div>
            <div class="flex p-3 place-self-center">
                <div class="bg-[#C4975E] my-7 mx-6 p-3 place-content-center rounded-lg">
                    <input type="submit" class="font-['Pirata_One'] mx-3 text-[#e5e5e5]" value="Valider">
                </div>
            </div>
        </form>
        <div class="bg-[#C4975E] my-7 mx-6 p-3 place-content-center rounded-lg">
            <a href="<?= FULLURLROOTPATH ?>" class="font-['Pirata_One'] mx-3 text-[#e5e5e5]"> Annuler </a>
        </div>
    </div>

    <?php include(__DIR__ . '/shared/footer.php'); ?>

</body>

</html>