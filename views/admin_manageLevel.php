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

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des niveaux</h1>

    <div
        class="overflow-y-auto max-h-[400px] bg-[#2e2e2e] rounded shadow m-6 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center">
        <table class="w-full">

            <!-- ajouter ici pour tous les comptes -->
            <tr class="border border-[#C4975E]">
                <td class="p-10">
                    <div class="flex">
                        <p>Nom : &nbsp;</p>
                        <select name="classe" id="class-select" class="max-h-6 rounded bg-[#3a3a3a]">
                            <option selected value="thief">Voleur</option>
                            <option value="wizard">Sorcier</option>
                            <option value="warrior">Guerrier</option>
                        </select>
                    </div>
                    <div class="flex">
                        <p>Numéro du niveau : &nbsp;</p>
                        <input type="number" required value="0" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Xp requis : &nbsp;</p>
                        <input type="number" required value="0" required class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>PV bonus : &nbsp;</p>
                        <input type="number" required value="0" required class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Mana bonus : &nbsp;</p>
                        <input type="number" required value="0" class="max-h-6 rounded  bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Force bonus : &nbsp;</p>
                        <input type="number" required value="0" class="max-h-6 rounded  bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Initiative bonus : &nbsp;</p>
                        <input type="number" required value="0" class="max-h-6 rounded bg-[#3a3a3a]">
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
            <select name="classe" id="class-select" class="max-h-6 rounded bg-[#3a3a3a]">
                <option value="thief">Voleur</option>
                <option value="wizard">Sorcier</option>
                <option value="warrior">Guerrier</option>
            </select>
        </div>
        <div class="flex">
            <p>Numéro du niveau : &nbsp;</p>
            <input type="number" required class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Xp requis : &nbsp;</p>
            <input type="number" required value="0" required class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>PV bonus : &nbsp;</p>
            <input type="number" required value="0" required class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Mana bonus : &nbsp;</p>
            <input type="number" required class="max-h-6 rounded  bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Force bonus : &nbsp;</p>
            <input type="number" required class="max-h-6 rounded  bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Initiative bonus : &nbsp;</p>
            <input type="number" required class="max-h-6 rounded bg-[#3a3a3a]">
        </div>

        <div class="text-center">
            <button class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] ml-2 mt-5">
                Ajouter</button>
        </div>
    </div>

    <?php include "./shared/footer.php"; ?>

</body>

</html>