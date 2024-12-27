<!DOCTYPE html>

    <div class="pagediv bg-[#F6F0E8] h-full w-full filter drop-shadow-lg shadow-inner">

        <div class="p-6 font-['Pirata_One'] justify-items-center text-center">
            <p class="text-black font-bold text-4xl m-20">MENU</p>
            <div class="bg-[#C4975E] p-6 m-20 text-2xl border-solid border-2 border-black rounded max-w-xs mx-auto pointer-events-auto cursor-pointer"
                id="continue">
                <p><?= $bouton ?></p>
            </div>
        </div>

    </div>

    <script>

        let canChange = false;

        btnContinue = document.getElementById("continue");
        btnContinue.removeAttribute("id");
        btnContinue.addEventListener("click", () => {
            if(canChange) window.bookmanager.loadTwoPageAndTurn("<?=FULLURLROOTPATH?>/book/page/chapter/p1", "<?=FULLURLROOTPATH?>/book/page/chapter/p2");
        });
    </script>

