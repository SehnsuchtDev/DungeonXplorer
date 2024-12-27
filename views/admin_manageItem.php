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

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des items</h1>


    <div
        class="overflow-y-auto max-h-[400px] bg-[#2e2e2e] rounded shadow m-6 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center">
        <table class="w-full">

            <!-- ajouter ici pour tous les comptes -->
            <tr class="border border-[#C4975E]">
                <td class="p-10">
                    <div class="flex">
                        <p>Nom : &nbsp;</p>
                        <input type="text" value="nom de l'item" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Description : &nbsp;</p>
                        <input type="text" value="" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Poids : &nbsp;</p>
                        <input type="number" value="0" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Nombre max : &nbsp;</p>
                        <input type="number" value="0" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Equipable : &nbsp;</p>
                        <input type="checkbox" class="max-h-6 rounded  bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Armure : &nbsp;</p>
                        <input type="checkbox" class="max-h-6 rounded  bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Nom de l'effet : &nbsp;</p>
                        <input type="text" value="" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Valeur de l'effet : &nbsp;</p>
                        <input type="number" value="0" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Coût en mana : &nbsp;</p>
                        <input type="number" value="0" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Valeur de protection : &nbsp;</p>
                        <input type="number" value="0" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Nombre de dégâts : &nbsp;</p>
                        <input type="number" value="0" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex m-3">
                        <img src="../public/assets/Giant Spider.jpg" alt="image" width="100" height="100" class="m-3" />
                        <input type="file" class="max-h-6 rounded bg-[#3a3a3a] self-center ">
                    </div>
                </td>

                <td class="p-7 text-right text-lg flex-col">
                    <div class="flex flex-col">
                        <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                            Modifier</button>
                        <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                            Supprimer</button>
                    </div>
                </td>
            </tr>

        </table>
    </div>

    <div
        class="max-h-[500px] bg-[#2e2e2e] rounded shadow m-6 p-6 px-16 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center border border-[#C4975E]">
        <div class="flex">
            <p>Nom : &nbsp;</p>
            <input type="text" required class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Description : &nbsp;</p>
            <input type="text" class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Poids : &nbsp;</p>
            <input type="number" value="0" required class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Nombre max : &nbsp;</p>
            <input type="number" value="0" required class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Equipable : &nbsp;</p>
            <input type="checkbox" class="max-h-6 rounded  bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Armure : &nbsp;</p>
            <input type="checkbox" class="max-h-6 rounded  bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Nom de l'effet : &nbsp;</p>
            <input type="text" class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Valeur de l'effet : &nbsp;</p>
            <input type="number" class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Coût en mana : &nbsp;</p>
            <input type="number" class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Valeur de protection : &nbsp;</p>
            <input type="number" class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Nombre de dégâts : &nbsp;</p>
            <input type="number" class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Image : &nbsp;</p>
            <input type="file" required class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="text-center">
            <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] ml-2 mt-5">
                Ajouter</button>
        </div>
    </div>

    <?php include "./shared/footer.php"; ?>

</body>

</html>