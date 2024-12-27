<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gestionnaire des histoires </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/script/tailwind.config.js"></script>
    <script defer src="contentManagement.js"></script>
</head>

<body class="bg-[#1a1a1a]">

    <?php include('./shared/header.php'); ?>

    <h1 class="p-10 text-center text-3xl font-['Pirata_One'] text-[#E5E5E5]"> Gestionnaire des histoires </h1>


    <div class="overflow-y-auto max-h-[400px] bg-[#2e2e2e] rounded shadow m-6 text-xl text-[#E5E5E5] font-['Roboto'] place-self-center ">
        <table class="w-full">
           
            <!-- elt1 -->
            <tr class="border border-[#C4975E] flex flex-col sm:flex-row"> 
                <td class="p-4 sm:p-6">
                    <div>
                        <img src="../public/assets/Village01.jpg" alt="image chapitre" class="w-32 sm:w-48 lg:w-64" />
                    </div>
                </td>
        
                <td>
                    <div>
                        <p class="font-bold"> Numéro du chapitre: &nbsp;</p>
                        <input type="text" value="Chapitre 6" class="max-h-6 rounded bg-[#2e2e2e] w-full sm:w-auto">
                    </div>
            
                    <div>
                        <p class="font-bold"> Nom du chapitre : &nbsp;</p>
                        <input type="text" value="Le loup noir" class="max-h-6 rounded bg-[#2e2e2e] w-full sm:w-auto">
                    </div>
            
                    <div>
                        <p class="font-bold"> Contenu du chapitre: &nbsp;</p>
                        <input type="text" value="À mesure que vous avancez, un bruissement attire votre attention..." class="max-h-6 rounded bg-[#2e2e2e] w-full sm:w-auto">
                    </div>

                    <div class="mt-4">
                        <p class="font-bold"> Choix du chapitre: </p>
                        <div class="bg-white rounded px-4 py-2 flex justify-between items-center text-black">
                            <span id="chapter">Sélectionnez un chapitre</span>
                            <button onclick="chapterSelection()"> &darr;</button>
                        </div>

                        <ul class="bg-white rounded mt-2 " id="pulldownmenu">
                            <li onclick="selectChapter(this)" class="text-black"> Chapitre 7 </li>
                            <li onclick="selectChapter(this)" class="text-black"> Chapitre 10 </li>
                        </ul>
                    </div>
                </td>

                <td class="p-4  flex flex-col">
                    <button class="bg-[#C4975E] text-white w-full  rounded hover:bg-[#C49700] my-5"> Modifier</button>
                    <button class="bg-[#C4975E] text-white w-full  rounded hover:bg-[#C49700] ">Supprimer</button>
                </td>
            </tr>

            <!-- elt2 -->
            <tr class="border border-[#C4975E] flex flex-col sm:flex-row"> 
                <td class="p-4 sm:p-6">
                    <div>
                        <img src="../public/assets/Village01.jpg" alt="image chapitre" class="w-32 sm:w-48 lg:w-64" />
                    </div>
                </td>
        
                <td>
                    <div>
                        <p class="font-bold"> Numéro du chapitre: &nbsp;</p>
                        <input type="text" value="Chapitre 6" class="max-h-6 rounded bg-[#2e2e2e] w-full sm:w-auto">
                    </div>
            
                    <div>
                        <p class="font-bold"> Nom du chapitre : &nbsp;</p>
                        <input type="text" value="Le loup noir" class="max-h-6 rounded bg-[#2e2e2e] w-full sm:w-auto">
                    </div>
            
                    <div>
                        <p class="font-bold"> Contenu du chapitre: &nbsp;</p>
                        <input type="text" value="À mesure que vous avancez, un bruissement attire votre attention..." class="max-h-6 rounded bg-[#2e2e2e] w-full sm:w-auto">
                    </div>

                    <div class="mt-4">
                        <p class="font-bold"> Choix du chapitre: </p>
                        <div class="bg-white rounded px-4 py-2 flex justify-between items-center text-black">
                            <span id="chapter">Sélectionnez un chapitre</span>
                            <button onclick="chapterSelection()"> &darr;</button>
                        </div>

                        <ul class="bg-white rounded mt-2 " id="pulldownmenu">
                            <li onclick="selectChapter(this)" class="text-black"> Chapitre 7 </li>
                            <li onclick="selectChapter(this)" class="text-black"> Chapitre 10 </li>
                        </ul>
                    </div>
                </td>

                <td class="p-4  flex flex-col">
                    <button class="bg-[#C4975E] text-white w-full  rounded hover:bg-[#C49700] my-5"> Modifier</button>
                    <button class="bg-[#C4975E] text-white w-full  rounded hover:bg-[#C49700] ">Supprimer</button>
                </td>
            </tr>

            <!-- elt3 -->
            <tr class="border border-[#C4975E] flex flex-col sm:flex-row"> 
                <td class="p-4 sm:p-6">
                    <div>
                        <img src="../public/assets/Village01.jpg" alt="image chapitre" class="w-32 sm:w-48 lg:w-64" />
                    </div>
                </td>
        
                <td>
                    <div>
                        <p class="font-bold"> Numéro du chapitre: &nbsp;</p>
                        <input type="text" value="Chapitre 6" class="max-h-6 rounded bg-[#2e2e2e] w-full sm:w-auto">
                    </div>
            
                    <div>
                        <p class="font-bold"> Nom du chapitre : &nbsp;</p>
                        <input type="text" value="Le loup noir" class="max-h-6 rounded bg-[#2e2e2e] w-full sm:w-auto">
                    </div>
            
                    <div>
                        <p class="font-bold"> Contenu du chapitre: &nbsp;</p>
                        <input type="text" value="À mesure que vous avancez, un bruissement attire votre attention..." class="max-h-6 rounded bg-[#2e2e2e] w-full sm:w-auto">
                    </div>

                    <div class="mt-4">
                        <p class="font-bold"> Choix du chapitre: </p>
                        <div class="bg-white rounded px-4 py-2 flex justify-between items-center text-black">
                            <span id="chapter">Sélectionnez un chapitre</span>
                            <button onclick="chapterSelection()"> &darr;</button>
                        </div>

                        <ul class="bg-white rounded mt-2 " id="pulldownmenu">
                            <li onclick="selectChapter(this)" class="text-black"> Chapitre 7 </li>
                            <li onclick="selectChapter(this)" class="text-black"> Chapitre 10 </li>
                        </ul>
                    </div>
                </td>

                <td class="p-4  flex flex-col">
                    <button class="bg-[#C4975E] text-white w-full  rounded hover:bg-[#C49700] my-5"> Modifier</button>
                    <button class="bg-[#C4975E] text-white w-full  rounded hover:bg-[#C49700] ">Supprimer</button>
                </td>
            </tr>
        </table>
    </div>

<?php include "./shared/footer.php"; ?>

</body>

</html>