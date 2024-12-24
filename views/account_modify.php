<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include('./shared/head.php'); ?>
</head>

<body class="bg-[#1a1a1a]">
    <!-- HEADER -->
    <?php include('./shared/header.php'); ?>

    <!-- ACCUEIL -->

    <div
        class="bg-[rgba(46,46,46,0.80)] place-self-center max-w-[50em] rounded text-[#e5e5e5] font-['Roboto'] p-12 m-24 text-xl">
        <p class="font-['Pirata_One'] text-center">VicLeTombeur</p>
        </br>
        <div class="flex m-2">
            <p class="text-[#C4975E]">Nom du profile : &nbsp;</p>
            <input type="text" placeholder="VicLeTombeur" id="profile_name" name="profile name" class="rounded max-h-6">
        </div>
        <div class="flex m-2">
            <p class="text-[#C4975E]">Mot de passe actuel : &nbsp;</p>
            <input type="password" placeholder="" id="actual_password" name="actual password" class="rounded max-h-6">
        </div>
        <div class="flex m-2">
            <p class="text-[#C4975E]">Nouveau mot de passe : &nbsp;</p>
            <input type="password" placeholder="" id="new_password" name="new password" class="rounded max-h-6">
        </div>
        <div class="flex m-2">
            <p class="text-[#C4975E]">Confirmation mot de passe : &nbsp;</p>
            <input type="password" placeholder="" id="new_password_confirmation" name="new password confirmation"
                class="rounded max-h-6">
        </div>

        <div class="flex p-3 place-self-center">
            <div class="bg-[#C4975E] my-7 mx-6 p-3 place-content-center rounded-lg">
                <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">Annuler</p>
            </div>
            <div class="bg-[#C4975E] my-7 mx-6 p-3 place-content-center rounded-lg">
                <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">Valider</p>
            </div>
        </div>
    </div>


    </main>

    <?php include('./shared/footer.php'); ?>

</body>

</html>