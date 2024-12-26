<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gestionnaire des comptes </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/script/tailwind.config.js"></script>
</head>

<body class="bg-[#1a1a1a]">

    <?php #include('./shared/header.php'); ?>

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des comptes</h1>

    <table class=" border border-gray-300 bg-[#2e2e2e] rounded shadow m-6 text-xl text-[#E5E5E5]">
        <tr class="border border-[#C4975E]">
            <td class="p-10">

                <div class="flex">
                    <p>Pseudo : </p>
                    <p>&nbsp;vicletombeur</p>
                </div>
                <div class="flex">
                    <p>Adresse mail : </p>
                    <p>&nbsp;vicletombeur@lemail.ocm</p>
                </div>
                <div class="flex">
                    <p>Personnage : </p>
                    <p>&nbsp;vicledylan</p>
                </div>

            </td>

            <td class="p-7 text-right">
                <button class="bg-blue-600 text-white w-20 h-10 rounded hover:bg-blue-700 my-1.5"> Modifier</button>
                <button class="bg-red-600 text-white w-20 h-10 rounded hover:bg-red-700 ml-2 my-1.5">Supprimer</button>
            </td>
        </tr>
        <!--
        <tr class="border border-[#C4975E]">
            <td class="p-5">

                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque magnam, nobis, rerum, iste incidunt
                    illo eaque esse quisquam unde odio ab necessitatibus eveniet pariatur consequuntur veniam iusto
                    ducimus deserunt itaque. </p>
            </td>

            <td class="p-4 text-right">
                <button class="bg-blue-600 text-white w-20 h-10 rounded hover:bg-blue-700 my-1.5"> Modifier</button>
                <button class="bg-red-600 text-white w-20 h-10 rounded hover:bg-red-700 ml-2 my-1.5">Supprimer</button>
            </td>
        </tr>

        <tr>
            <td class="p-5">

                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid omnis assumenda recusandae quasi
                    tenetur officiis labore, accusamus suscipit, ullam error voluptatibus nihil officia! Dicta soluta
                    nulla ad. Aliquam, cum minima! </p>
            </td>

            <td class="p-4 text-right">
                <button class="bg-blue-600 text-white w-20 h-10  rounded hover:bg-blue-950 my-1.5"> Modifier</button>
                <button class="bg-red-600 text-white w-20 h-10 rounded hover:bg-red-950 ml-2 my-1.5">Supprimer</button>
            </td>
        </tr>
    </table>
-->
        <!-- faire un formulaire avec e-mail, pseudo et mot de passe + revoir les traits + revoir charte graphique -->


        <?php #include "./shared/footer.php"; ?>

</body>

</html>