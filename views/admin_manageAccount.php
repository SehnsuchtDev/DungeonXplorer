<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Page Administrateur </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/script/tailwind.config.js"></script>
</head>

<body class="bg-[#1a1a1a]">

    <?php include('./shared/header.php'); ?>
    <?php include('./shared/admin_menu.php'); ?>

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des comptes</h1>


    <div
        class="overflow-y-auto max-h-[400px] bg-[#2e2e2e] rounded shadow m-6 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center">
        <table class="w-full">

            <!-- ajouter ici pour tous les comptes -->
            <tr class="border border-[#C4975E]">
                <td class="p-10">
                    <div class="flex">
                        <p>Pseudo : &nbsp;</p>
                        <input type="text" value="vicletombeur" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Adresse mail : &nbsp;</p>
                        <input type="email" value="vicletombeur@lemail.com" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Personnage : &nbsp;</p>
                        <input type="text" value="vicos&dylanos" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                </td>
                <td class="p-7 text-right text-lg flex-col">
                    <div class="flex">
                        <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                            Modifier</button>
                        <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] ml-2 my-1.5">
                            Supprimer</button>
                    </div>
                    <div class="flex">
                        <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                            Suppr. Aventure</button>
                        <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] ml-2 my-1.5">
                            Suppr. Personnage</button>
                    </div>
                </td>
            </tr>

        </table>
    </div>

    <?php include "./shared/footer.php"; ?>

</body>

</html>