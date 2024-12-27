<!-- Container for the sign-up form -->
<div id="divInscription"
    class="pagediv bookcover ml-[400px] text-[#FFFFFF] place-self-center font-['Pirata_One'] w-full h-full">
    <h1 class="text-center text-4xl p-6"> Inscription </h1>

    <!-- Sign-up form with dynamic form action and method -->
    <form id="formulaire-inscription<?= $seed ?>" method="post" action="<?= FULLURLROOTPATH ?>/book/page/signup">
        <span class="flex justify-between items-center p-2 flex-col">
            <label for="pseudo" class="text-[2.2vh]">Pseudo:</label>
            <input id="pseudo" type="text" name="pseudo" placeholder="Veuillez rentrer votre pseudo"
                class="text-[2.2vh] border-2 w-[25vw] min-w-64 max-w-80 max-h-7 bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex justify-between items-center p-2 flex-col">
            <label for="email" class="px-4 text-[2.2vh]">E-mail:</label>
            <input id="email" type="email" name="mail" placeholder="Veuillez rentrer votre adresse mail"
                class="text-[2.2vh] border-2 w-[25vw] min-w-64 max-w-80 max-h-7 bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex justify-between items-center p-2 flex-col">
            <label for="password" class="px-4 text-[2.2vh]">Mot de passe:</label>
            <input id="password" type="password" name="password" placeholder="Veuillez rentrer votre mot de passe"
                class="text-[2.2vh] border-2 w-[25vw] min-w-64 max-w-80 max-h-7 bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex justify-between items-center p-2 flex-col">
            <label for="confirmpsw" class="px-4 text-[2.2vh]">Confirmer le mot de passe:</label>
            <input id="confirmpsw" type="password" name="passwordconfirm"
                placeholder="Veuillez confirmer votre mot de passe"
                class="text-[2.2vh] border-2 w-[25vw] min-w-64 max-w-80 max-h-7 bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex flex-col items-center space-y-3 mt-8">
            <input type="submit" value="S'Inscrire" class=" bg-[#2E2E2E] py-3 px-5 text-[2vh] rounded pointer-events-auto cursor-pointer
                max-[640px]:w-32
                max-[640px]:p-3
                max-[500px]:p-2">
            </input>

            ou
            <button id="connect<?= $seed ?>" type="button"
                class=" bg-[#2E2E2E] py-2 px-4 text-[2vh] rounded pointer-events-auto cursor-pointer"> Se connecter
            </button>
        </span>
    </form>
</div>

<!-- JavaScript for form submission and dynamic page management -->
<script>

    <?php if (isset($errors) && empty($errors)): ?>
        if (window.bookmanager == undefined) {
            document.addEventListener("DOMContentLoaded", async () => {
                await new Promise(r => setTimeout(r, 300));
                window.bookmanager.loadTwoPageAndTurn("<?= FULLURLROOTPATH ?>/book/page/hero/p1", "<?= FULLURLROOTPATH ?>/book/page/hero/p2");
            });
        }
        else {
            window.location.reload();
        }

    <?php elseif (isset($errors)): ?>
        str = "";
        <?php foreach ($errors as $e): ?>
            str += "<?= $e ?>\n";
        <?php endforeach ?>
        alert(str);
    <?php endif; ?>



    document.getElementById("formulaire-inscription<?= $seed ?>").addEventListener("submit", (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);
        bookmanager.refreshDivWithPostMethod(event.target.action, formData, "divInscription");
    });

    document.getElementById("connect<?= $seed ?>").addEventListener("click", (event) => {
        window.bookmanager.replacePage("book/page/login").then(() => {
            document.querySelectorAll(".pagediv")[0].style.marginLeft = "400px";
        });
    });
</script>