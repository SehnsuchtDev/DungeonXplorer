<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DungeonXPlorer</title>
    <link rel="stylesheet" href="./style/style.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="./script/tailwind.config.js"></script>
</head>
<body class="bg-[#1a1a1a]">
    <!-- HEADER -->
    <?php include('header.php'); ?>

    <!-- ACCUEIL -->

        <div class="bg-[rgba(46,46,46,0.80)] place-self-center max-w-[50em] rounded text-[#e5e5e5] font-['Roboto'] p-12 m-24 text-xl">
            <p class="font-['Pirata_One'] text-center">VicLeTombeur</p>
            </br>
            <div class="flex">
                <p class="text-[#C4975E]">Personnage(s) : &nbsp;</p>
                <p class="text-[#e5e5e5]">dylan </p>
            </div>
            <div class="flex">
                <p class="text-[#C4975E]">Adresse mail : &nbsp;</p>
                <p class="text-[#e5e5e5]">vicletombeur@lemail.com </p>
            </div>
            <div class="flex">
                <p class="text-[#C4975E]">Date de création : &nbsp;</p>
                <p class="text-[#e5e5e5]">02/07/2024 </p>
            </div>
            
            <div class="flex p-3">
                <div class="bg-[#C4975E] my-7 mx-6 p-3 place-content-center rounded-lg" >
                    <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">Modifier le profil</p>
                </div>
                <div class="bg-[#C4975E] my-7 mx-6 p-3 place-content-center rounded-lg" >
                    <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">Supprimer le compte</p>
                </div>
            </div>
        </div>

        
    </main>

    <?php include('footer.php'); ?>

</body>
</html>