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

    <div class="bg-[#F6F0E8] h-full w-full filter drop-shadow-lg shadow-inner place-content-center">

        <div class="p-6 font-['Pirata_One'] justify-items-center text-center">

            <div class="bg-[#C4975E] py-3 px-6 m-16 text-2xl border-solid border-2 border-black rounded max-w-xs mx-auto pointer-events-auto cursor-pointer"
                id="restart">
                <p>Recommencer l'aventure</p>
            </div>
            <div class="bg-[#C4975E] py-3 px-6 m-16 text-2xl border-solid border-2 border-black rounded max-w-xs mx-auto pointer-events-auto cursor-pointer"
                id="index">
                <p>Retourner à l'accueil</p>
            </div>
        </div>

    </div>

    <script>

        btnRestart = document.getElementById("restart");
        btnRestart.removeAttribute("id");
        btnRestart.addEventListener("click", () => {
            window.bookmanager.loadTwoPageAndTurn("http://localhost/medieval/DungeonXplorer/views/booktest/test_chapter2-p1.php", "http://localhost/medieval/DungeonXplorer/views/booktest/test_chapter2-p2.php");
        });

        btnIndex = document.getElementById("index");
        btnIndex.removeAttribute("id");
        btnIndex.addEventListener("click", () => {
            window.bookmanager.loadTwoPageAndTurn("http://localhost/medieval/DungeonXplorer/views/booktest/test_chapter2-p1.php", "http://localhost/medieval/DungeonXplorer/views/booktest/test_chapter2-p2.php");
        });

    </script>


</body>

</html>