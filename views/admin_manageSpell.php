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

    <?php include(__DIR__ . '/shared/header.php'); ?>
    <?php include(__DIR__ . '/shared/admin_menu.php'); ?>

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des sorts</h1>

    <div
        class="overflow-y-auto max-h-[400px] bg-[#2e2e2e] rounded shadow m-6 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center">
        <table class="w-full">

            <?php foreach($spellTable as $key => $spell): ?>
                <!-- ajouter ici pour tous les comptes -->
                <tr class="border border-[#C4975E]">
                    <form action="<?= FULLURLROOTPATH ?>/admin/spell/modify/<?=$spell["sp_id"]?>" method="post">
                        <td class="p-10">
                            <div class="flex">
                                <p>Nom : &nbsp;</p>
                                <input name="name" type="text" value="<?=$spell['sp_name']?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Coût en mana : &nbsp;</p>
                                <input name="manaCost" type="number" value="<?=$spell['sp_manacost']?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Dégâts : &nbsp;</p>
                                <input name="damage" type="number" value="<?=$spell['sp_damage']?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                        </td>
                        <td class="p-7 text-right text-lg flex-col">
                            <div class="flex">
                                <input type="submit" value="Modifier" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                                <a href="<?= FULLURLROOTPATH ?>/admin/spell/delete/<?=$spell["sp_id"]?>" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] ml-2 my-1.5">
                                    Supprimer</a>
                            </div>
                        </td>
                    </form>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <div
        class="max-h-[400px] bg-[#2e2e2e] rounded shadow m-6 p-6 px-16 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center border border-[#C4975E]">
        <div class="flex">
            <p>Nom : &nbsp;</p>
            <input name="nom" type="text" placeholder="nom du sort" class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Coût en mana : &nbsp;</p>
            <input name="coutMana" type="number" value="0" class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="flex">
            <p>Dégâts : &nbsp;</p>
            <input name="degat" type="number" value="0" class="max-h-6 rounded bg-[#3a3a3a]">
        </div>
        <div class="text-center">
            <a href="" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] ml-2 mt-5">
                Ajouter</a>
        </div>
    </div>


    <?php include __DIR__ . "/shared/footer.php"; ?>

</body>

</html>