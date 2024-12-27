<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Page Administrateur </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/script/tailwind.config.js"></script>
</head>

<body class="bg-[#1a1a1a] ">

    <?php include('./shared/header.php'); ?>
    <?php include('./shared/admin_menu.php'); ?>

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des items</h1>

    <div
    class="overflow-y-auto h-auto w-full sm:w-[90%] md:w-[80%] lg:w-[500px] bg-[#2e2e2e] rounded shadow text-xl text-[#E5E5E5] font-['Roboto'] mx-auto my-5 p-5">
    <table class="w-full">
        <tr class="border border-[#C4975E] flex flex-wrap md:flex-nowrap">
            <td class="p-5 flex-1">
                <div class="flex flex-wrap sm:flex-col gap-3">
                    <div class="flex items-center">
                        <p>Nom : &nbsp;</p>
                        <input type="text" value="nom de l'item" class="w-full max-w-[200px] rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center">
                        <p>Description : &nbsp;</p>
                        <input type="text" value="" class="w-full max-w-[200px] rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center">
                        <p>Poids : &nbsp;</p>
                        <input type="number" value="0" class="w-full max-w-[100px] rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center">
                        <p>Nombre max : &nbsp;</p>
                        <input type="number" value="0" class="w-full max-w-[100px] rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center">
                        <p>Equipable : &nbsp;</p>
                        <input type="checkbox" class="rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center">
                        <p>Armure : &nbsp;</p>
                        <input type="checkbox" class="rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center">
                        <p>Nom de l'effet : &nbsp;</p>
                        <input type="text" value="" class="w-full max-w-[200px] rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center">
                        <p>Valeur de l'effet : &nbsp;</p>
                        <input type="number" value="0" class="w-full max-w-[100px] rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center">
                        <p>Coût en mana : &nbsp;</p>
                        <input type="number" value="0" class="w-full max-w-[100px] rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center">
                        <p>Valeur de protection : &nbsp;</p>
                        <input type="number" value="0" class="w-full max-w-[100px] rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center">
                        <p>Nombre de dégâts : &nbsp;</p>
                        <input type="number" value="0" class="w-full max-w-[100px] rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="../public/assets/Giant Spider.jpg" alt="image" width="100" height="100" class="rounded">
                        <input type="file" class="rounded bg-[#3a3a3a]">
                    </div>
                </div>
            </td>

            <td class="p-5 flex justify-end flex-col items-end">
                <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">Modifier</button>
                <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">Supprimer</button>
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
            <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] ">
                Ajouter</button>
        </div>
    </div>

    <?php include "./shared/footer.php"; ?>

</body>

</html>