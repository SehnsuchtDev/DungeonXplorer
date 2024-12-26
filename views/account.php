<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include(__DIR__ .'/shared/head.php'); ?>
</head>
<body class="bg-[#1a1a1a]">
    <!-- HEADER -->
    <?php include(__DIR__ . '/shared/header.php'); ?>

    <!-- ACCUEIL -->

        <div class="bg-[rgba(46,46,46,0.80)] place-self-center max-w-[50em] rounded text-[#e5e5e5] font-['Roboto'] p-12 m-24 text-xl">
            <p class="font-['Pirata_One'] text-center">VicLeTombeur</p>
            </br>
            <div class="flex">
                <p class="text-[#C4975E]">Username(s) : &nbsp;</p>
                <p class="text-[#e5e5e5]">
                    <?= $name ?>
                </p>
            </div>
            <div class="flex">
                <p class="text-[#C4975E]">Adresse mail : &nbsp;</p>
                <p class="text-[#e5e5e5]">
                    <?= $email ?>
                </p>
            </div>
            <div class="flex">
                <p class="text-[#C4975E]">Hero : &nbsp;</p>
                <p class="text-[#e5e5e5]">
                    <?= $heroName ?>
                </p>
            </div>
            <div class="flex p-3">
                <div class="bg-[#C4975E] my-7 mx-6 p-3 place-content-center rounded-lg" >
                    <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">
                        Modifier le profil</p>

                    </div>
                <div class="bg-[#C4975E] my-7 mx-6 p-3 place-content-center rounded-lg" >
                    <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">
                    <a href="delete">Supprimer le compte</a>        
                </p>
                </div>
            </div>
        </div>

        
    </main>

    <?php include( __DIR__ . '/shared/footer.php'); ?>

</body>
</html>