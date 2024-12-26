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

        <div class="p-6 font-['Pirata_One'] justify-items-center text-center">

            <div class="bg-[#C4975E] py-1 px-6 m-3 text-2xl rounded max-w-xs mx-auto" id="choice2"
                class="pointer-events-auto">
                <p>Un adversaire approche...</p>
            </div>

            <img src="..\public\assets\Giant Spider.jpg" alt="" width="300" height="100" title="" />

            <p class="text-2xl font-bold">GIANT SPIDER</p>

            <div class="flex">
                <div class="flex m-4">
                    <img src="..\public\assets\health.png" alt="player's health" width="50" height="50"
                        title="player's health" />
                    <p class="content-center">&nbsp; 80</p>
                </div>
                <div class="flex m-4">
                    <img src="..\public\assets\mana.png" alt="player's mana" width="50" height="50"
                        title="player's mana" />
                    <p class="content-center">&nbsp; 5</p>
                </div>
                <div class="flex m-4">
                    <img src="..\public\assets\shield.png" alt="player's shield" width="50" height="50"
                        title="player's shield" />
                    <p class="content-center">&nbsp; 5</p>
                </div>
            </div>

            <!-- AVANT COMBAT -->
            <div class="bg-[#C4975E] py-3 px-6 m-3 text-2xl rounded max-w-xs mx-auto pointer-events-auto cursor-pointer"
                id="choice1">
                <p>Commencer le combat</p>
            </div>


            <!-- COMBAT EN COURS 
            <p>C'est votre tour.</p>
            <div class="flex">
                <div class="bg-[#C4975E] py-1 px-3 m-3 mr-6 text-xl border-solid border-2 border-black rounded max-w-36 w-32 mx-auto pointer-events-auto cursor-pointer"
                    id="choice1">
                    <p>ATTAQUER</p>
                </div>
                <div class="bg-[#C4975E] py-1 px-3 m-3 text-xl border-solid border-2 border-black rounded max-w-36 w-32 mx-auto pointer-events-auto cursor-pointer"
                    id="choice1">
                    <p>FUIR</p>
                </div>
            </div>-->

        </div>

    </div>

    <script>

        btnChoice1 = document.getElementById("choice1");
        btnChoice1.removeAttribute("id");
        btnChoice1.addEventListener("click", () => {
            window.bookmanager.loadTwoPageAndTurn("http://localhost/medieval/DungeonXplorer/views/booktest/test_chapter2-p1.php", "http://localhost/medieval/DungeonXplorer/views/booktest/test_chapter2-p2.php");
        });

        btnChoice2 = document.getElementById("choice2");
        btnChoice2.removeAttribute("id");
        btnChoice2.addEventListener("click", () => {
            window.bookmanager.loadTwoPageAndTurn("http://localhost/medieval/DungeonXplorer/views/booktest/test_chapter2-p1.php", "http://localhost/medieval/DungeonXplorer/views/booktest/test_chapter2-p2.php");
        });

    </script>


</body>

</html>