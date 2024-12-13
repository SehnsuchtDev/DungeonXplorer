<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
	<script src="public/script/tailwind.config.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=menu" />
</head>
<body>

    <header class="bg-[#2e2e2e] flex flex-row justify-between">

        <div class="flex flex-row">
            <img src="..\public\assets\Logo.png" title="logoDungeonXplorer" class="size-28">

            <span class="material-symbols-outlined my-auto ml-7 text-[#e5e5e5]">
                person
            </span>
            <p class="font-['Pirata_One'] text-[#e5e5e5] text-2xl ml-2 my-auto">Username</p>
        </div>

        <div class="flex flex-row space-w">

            <div class="bg-[#C4975E] my-7 mx-6 place-content-center rounded-lg max-[615px]:invisible" >
                <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">Mode Histoire</p>
            </div>
            
            <div class="bg-[#C4975E] my-7 mx-6 place-content-center rounded-lg max-[615px]:invisible">
                <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">Se déconnecter</p>
            </div>

            <div class="bg-[#C4975E] my-7 mx-6 place-content-center rounded-lg max-[615px]:invisible">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </div>

        </div>

    </header>
    
</body>
</html>
