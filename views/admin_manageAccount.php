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

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des comptes</h1>


    <div
        class="overflow-y-auto max-h-[400px] bg-[#2e2e2e] rounded shadow m-6 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center">
        <table class="w-full">

            <!-- ajouter ici pour tous les comptes -->
            <?php foreach($userTable as $key => $user):?>
                
                <tr class="border border-[#C4975E]">
                    <form action="<?= FULLURLROOTPATH ?>/admin/user/modify/<?=$user["us_id"]?>" method="post">
                        <td class="p-10">
                            <div class="flex">
                                <p>Pseudo : &nbsp;</p>
                                <input name="pseudo" type="text" value="<?=$user['us_username']?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Adresse mail : &nbsp;</p>
                                <input name="mail" type="email" value="<?=$user['us_email']?>" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                            <div class="flex">
                                <p>Password : &nbsp;</p>
                                <input name="motDePasse" type="password" class="max-h-6 rounded bg-[#3a3a3a]">
                            </div>
                        </td>
                        <td class="p-7 text-right text-lg flex-col">
                            <div class="flex">
                                <input type="submit" value="Modifier" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                                <a href="<?= FULLURLROOTPATH ?>/admin/user/delete/<?=$user["us_id"]?>" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                                Supprimer</a>
                            </div>
                            <div class="flex">
                                <a href="<?= FULLURLROOTPATH ?>/admin/user/delete/adventure/<?=$user["us_id"]?>" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] my-1.5">
                                Suppr. Aventure</a>
                                <a href="<?= FULLURLROOTPATH ?>/admin/user/delete/character/<?=$user["us_id"]?>" class="bg-[#C4975E] text-white w-36 h-10 rounded hover:bg-[#C49700] ml-2 my-1.5">
                                Suppr. Personnage</a>
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