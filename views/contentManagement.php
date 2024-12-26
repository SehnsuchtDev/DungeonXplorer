<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gestionnaire des histoires </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/script/tailwind.config.js"></script>
</head>

<body class="bg-[#1a1a1a]">

    <?php include('./shared/header.php'); ?>

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des histoires </h1>


    <div
        class="overflow-y-auto max-h-[400px] bg-[#2e2e2e] rounded shadow m-6 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center">
        <table class="w-full">
           <!-- include ici pour tous les comptes -->
           <?php include "./contentManagementFrame.php"; ?>
            <?php include "./contentManagementFrame.php"; ?>
            <?php include "./contentManagementFrame.php"; ?>
            <?php include "./contentManagementFrame.php"; ?>
            <?php include "./contentManagementFrame.php"; ?>
            <?php include "./contentManagementFrame.php"; ?>
            <?php include "./contentManagementFrame.php"; ?>
        </table>
    </div>

    <?php include "./shared/footer.php"; ?>

</body>

</html>