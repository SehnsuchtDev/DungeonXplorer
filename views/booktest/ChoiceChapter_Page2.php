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
            <img src="..\public\assets\Chest01.jpg" alt="" width="250" height="150" title="" />
            </br></br>
            <p class="text-2xl font-bold">Choix possibles pour le joueur?</p>
            <div class="flex">
                <div class="bg-[#C4975E] py-3 px-6 m-10 mr-16 text-2xl border-solid border-2 border-black rounded max-w-xs mx-auto"
                    id="choice1" class="pointer-events-auto">
                    <p>oui</p>
                </div>
                <div class="bg-[#C4975E] py-3 px-6 m-10 text-2xl border-solid border-2 border-black rounded max-w-xs mx-auto"
                    id="choice2" class="pointer-events-auto">
                    <p>non</p>
                </div>
            </div>
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