
    <div class="pagediv bg-[#F6F0E8] h-full w-full filter drop-shadow-lg shadow-inner place-content-center">

        <div class="p-6 font-['Pirata_One'] justify-items-center text-center">

            <div class="bg-[#C4975E] py-3 px-6 m-16 text-2xl border-solid border-2 border-black rounded max-w-xs mx-auto pointer-events-auto cursor-pointer"
                id="restart<?=$seed?>">
                <p>Recommencer l'aventure</p>
            </div>
            <div class="bg-[#C4975E] py-3 px-6 m-16 text-2xl border-solid border-2 border-black rounded max-w-xs mx-auto pointer-events-auto cursor-pointer"
                id="index<?=$seed?>">
                <p>Retourner à l'accueil</p>
            </div>
        </div>

    </div>

    <script defer>

        document.getElementById("restart<?=$seed?>").addEventListener("click", () => {
            window.bookmanager.loadTwoPageAndTurn("<?= FULLURLROOTPATH?>/book/page/chapter/p1", "<?= FULLURLROOTPATH?>/book/page/chapter/p2");
        });


        document.getElementById("index<?=$seed?>").addEventListener("click", () => {
            window.location.href = "<?= FULLURLROOTPATH?>/";
        });

    </script>
