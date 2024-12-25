<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/script/tailwind.config.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=person" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=menu" />
</head>

<body>

    <div class="bg-[#F6F0E8] h-full w-full filter drop-shadow-lg shadow-inner">

        <div class="p-10 font-['Pirata_One']">
            <div class="flex">
                <img src="..\public\assets\Wizard.jpg" alt="profile picture" width="100" height="100"
                    title="profile picture" class="rounded" />
                <input type="text" value="Nom" id="name" alt="character's name"
                    class="text-black font-bold text-3xl ml-6 p-1 place-content-center max-h-12 max-w-48">
            </div>

            <div class="text-justify">
                <p class="text-black font-bold text-3xl m-3 mt-10">Biographie</p>
                <textarea id="biography" name="biography" alt="character's name" rows="8" cols="33"
                    class="text-black font-['Roboto'] text-lg font-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipiscialias soluta magni. Molestiae voluptate, voluptates dicta dignissimos facere reiciendis error illumcommodi laudantium numquam, dolorem quam fugit perferendis. Natus, sit!
                </textarea>

            </div>

            <div class="flex">
                <p class=" text-black font-bold text-3xl m-3">Classe : &nbsp;</p>
                <select id="class" name="class" class="font-['Roboto'] place-self-center max-h-6">
                    <option value="wizard">Sorcier</option>
                    <option value="thief">Voleur</option>
                    <option value="warrior">Guerrier</option>
                </select>
            </div>

        </div>

    </div>Z


</body>

</html>