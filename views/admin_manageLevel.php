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

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des niveaux</h1>

    <div
        class="overflow-y-auto max-h-[400px] bg-[#2e2e2e] rounded shadow m-6 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center">
        <table class="w-full">

            <!-- ajouter ici pour tous les comptes -->
            <?php foreach($level as $key => $levelId):?>

            <tr class="border border-[#C4975E]">
                <form action="<?= FULLURLROOTPATH ?>/admin/class/modify/<?=$levelId['le_id']?>" method="post">
                <td class="p-10">
                    <div class="flex">
                        <p>Numéro du niveau : </p>
                        <input type="number" name="numero" required value="<?php echo $levelId['le_level']?>" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Xp requis : &nbsp;</p>
                        <input type="number"  name="xp" required value="<?php echo $levelId['le_required_xp']?>" required class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>PV bonus : &nbsp;</p>
                        <input type="number"  name="pvBonus" required value="<?php echo $levelId['le_pv_bonus']?>" required class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Mana bonus : &nbsp;</p>
                        <input type="number"   name="mana" required value="<?php echo $levelId['le_mana_bonus']?>" class="max-h-6 rounded  bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Force bonus : &nbsp;</p>
                        <input type="number"  name="force" required value="<?php echo $levelId['le_strength_bonus']?>" class="max-h-6 rounded  bg-[#3a3a3a]">
                    </div>
                    <div class="flex">
                        <p>Initiative bonus : &nbsp;</p>
                        <input type="number" name="initiative" required value="<?php echo $levelId['le_initiative_bonus']?>" class="max-h-6 rounded bg-[#3a3a3a]">
                    </div>
                </td>

                <td class="p-7 text-right text-lg flex-col">
                    <div class="flex flex-col">
                        <input type="submit" value="Modifier" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">

                        <a href="admin/class/delete" class="bg-[#C4975E] text-center text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                            Supprimer</a>
                    </div>
                </td>
                </form>
            </tr>
            <?php endforeach?>

        </table>
    </div>


    <?php include __DIR__ . "/shared/footer.php"; ?>

</body>

</html>