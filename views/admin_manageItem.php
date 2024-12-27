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

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des items</h1>


    <div
        class="overflow-y-auto max-h-[400px] bg-[#2e2e2e] rounded shadow m-6 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center">
        <table class="w-full">

            <?php foreach($itemTable as $kay => $item): ?>
                <!-- ajouter ici pour tous les comptes -->
                <tr class="border border-[#C4975E]">
                    <form action="<?= FULLURLROOTPATH ?>/admin/item/modify/<?=$item["it_id"]?>" method="post">
                        <td class="p-10">
                            <div class="flex">
                                <p>Nom : &nbsp;</p>
                                <input name="name" type="text" value="<?=$item["it_name"]?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Description : &nbsp;</p>
                                <input name="desc" type="text" value="<?=$item["it_description"]?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Poids : &nbsp;</p>
                                <input name="poids" type="number" value="<?=$item["it_weight"]?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Nombre max : &nbsp;</p>
                                <input name="nbMax" type="number" value="<?=$item["it_maxstack"]?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Equipable : &nbsp;</p>
                                <input name="equip" type="checkbox" class="max-h-6 rounded  bg-[#3a3a3a]" <?php if($item["it_handitem"]===1): ?>checked <?php endif ?>>
                            </div>
                            <div class="flex">
                                <p>Armure : &nbsp;</p>
                                <input name="armure" type="checkbox" class="max-h-6 rounded  bg-[#3a3a3a]" <?php if($item["it_armor"]===1): ?>checked <?php endif ?>> 
                            </div>
                            <div class="flex">
                                <p>Nom de l'effet : &nbsp;</p>
                                <input name="nomEffet" type="text" value="<?=$item["it_effectname"]?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Valeur de l'effet : &nbsp;</p>
                                <input name="valEffet" type="number" value="<?=$item["it_effectvalue"]?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Coût en mana : &nbsp;</p>
                                <input name="coutMana" type="number" value="<?=$item["it_manacost"]?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Valeur de protection : &nbsp;</p>
                                <input name="valProtection" type="number" value="<?=$item["it_protectvalue"]?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Nombre de dégâts : &nbsp;</p>
                                <input name="nbDegat" type="number" value="<?=$item["it_damage"]?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex m-3">
                                <img src="<?= FULLURLROOTPATH ?>/public/assets/<?=$item["it_image"]?>" alt="image" width="100" height="100" class="m-3" />
                                <input type="file" class="max-h-6 rounded bg-[#3a3a3a] self-center ">
                            </div>
                        </td>
                        
                        <td class="p-7 text-right text-lg flex-col">
                            <div class="flex flex-col">
                                <input type="submit" value="Modifier" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                                <a href="<?= FULLURLROOTPATH ?>/admin/item/delete/<?=$item["it_id"]?>" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                                    Supprimer</a>
                            </div>
                        </td>
                    </form> 
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <div
        class="max-h-[500px] bg-[#2e2e2e] rounded shadow m-6 p-6 px-16 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center border border-[#C4975E]">
        <form action="<?= FULLURLROOTPATH ?>/admin/item/add/" method="post">
            <div class="flex">
                <p>Nom : &nbsp;</p>
                <input name="name" type="text" required class="max-h-6 rounded bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Description : &nbsp;</p>
                <input name="desc" type="text" class="max-h-6 rounded bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Poids : &nbsp;</p>
                <input name="poids" type="number" value="0" required class="max-h-6 rounded bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Nombre max : &nbsp;</p>
                <input name="nbMax" type="number" value="0" required class="max-h-6 rounded bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Equipable : &nbsp;</p>
                <input name="equip" type="checkbox" class="max-h-6 rounded  bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Armure : &nbsp;</p>
                <input name="armure" type="checkbox" class="max-h-6 rounded  bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Nom de l'effet : &nbsp;</p>
                <input name="nomEffet" type="text" class="max-h-6 rounded bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Valeur de l'effet : &nbsp;</p>
                <input name="valEffet" type="number" class="max-h-6 rounded bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Coût en mana : &nbsp;</p>
                <input name="coutMana" type="number" class="max-h-6 rounded bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Valeur de protection : &nbsp;</p>
                <input name="valProtection" type="number" class="max-h-6 rounded bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Nombre de dégâts : &nbsp;</p>
                <input name="nbDegat" type="number" class="max-h-6 rounded bg-[#3a3a3a]">
            </div>
            <div class="flex">
                <p>Image : &nbsp;</p>
                <input name="image" type="file" required class="max-h-6 rounded bg-[#3a3a3a]">
            </div>
            <div class="text-center">
                <input type="submit" value="Ajouter" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] ml-2 mt-5">
            </div>
        </form>
    </div>

    <?php include __DIR__ . "/shared/footer.php"; ?>

    <script>
        <?php if (isset($errors)): ?>
        str = "";
        <?php foreach ($errors as $e): ?>
            str += "<?= $e ?>\n";
        <?php endforeach ?>
        alert(str);
        <?php endif; ?>
    </script>

</body>

</html>