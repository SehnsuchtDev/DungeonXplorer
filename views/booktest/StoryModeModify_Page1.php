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
            <p class="text-black font-bold text-4xl m-20">MENU</p>
            <div class="bg-[#C4975E] p-6 m-20 text-2xl border-solid border-2 border-black rounded max-w-xs mx-auto cursor-pointer pointer-events-auto"
                id="cancel">
                <p>Annuler</p>
            </div>
            <div class="bg-[#C4975E] p-6 m-20 text-2xl border-solid border-2 border-black rounded max-w-xs mx-auto cursor-pointer pointer-events-auto"
                id="submit">
                <p>Valider</p>
            </div>
        </div>

    </div>

    <script>

        btnCancel = document.getElementById("cancel");
        btnCancel.removeAttribute("id");
        btnCancel.addEventListener("click", () => {
            window.bookmanager.loadTwoPageAndTurn("./booktest/StoryMode_Page1.php", "./booktest/StoryMode_Page2.php");
        });

        btnSubmit = document.getElementById("submit");
        btnSubmit.removeAttribute("id");
        btnSubmit.addEventListener("click", () => {
            window.bookmanager.loadTwoPageAndTurn("./booktest/StoryMode_Page1.php", "./booktest/StoryMode_Page2.php");
        });

    </script>


</body>

</html>