<div id="divInscription"
    class="pagediv bookcover ml-[400px] text-[#FFFFFF] place-self-center font-['Pirata_One'] w-full h-full">
    <h1 class="text-center text-4xl p-9"> Inscription </h1>
    <form id="formulaire-inscription<?= $seed ?>" method="post" action="<?= FULLURLROOTPATH ?>/book/page/signup">
        <span class="flex justify-between items-center p-2 flex-col">
            <label class="text-[2.5vh]">Pseudo:</label>
            <input type="text" name="pseudo" placeholder="Veuillez rentrer votre pseudo"
                class="text-[2.5vh] border-2 w-[25vw] min-w-64 bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex justify-between items-center p-2 flex-col">
            <label class="px-4 text-[2.5vh]">E-mail:</label>
            <input type="email" name="mail" placeholder="Veuillez rentrer votre adresse mail"
                class="text-[2.5vh] border-2 w-[25vw] min-w-64 bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex justify-between items-center p-2 flex-col">
            <label class="px-4 text-[2.5vh]">Mot de passe:</label>
            <input type="password" name="motDePasse" placeholder="Veuillez rentrer votre mot de passe"
                class="text-[2.5vh] border-2 w-[25vw] min-w-64 bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex justify-between items-center p-2 flex-col">
            <label class="px-4 text-[2.5vh]">Confirmer le mot de passe:</label>
            <input type="password" name="motDePasse" placeholder="Veuillez confirmer votre mot de passe"
                class="text-[2.5vh] border-2 w-[25vw] min-w-64 bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex flex-col items-center space-y-3 mt-8">
            <input type="submit" value="S'Inscrire" class=" bg-[#2E2E2E] p-4 w-48  rounded pointer-events-auto
                max-[640px]:w-32
                max-[640px]:p-3
                max-[500px]:p-2">
            </input>

            <p class="text-[3vh] h-1 pb-4"> ou </p>
            <button id="connect<?= $seed ?>" type="button"
                class=" bg-[#2E2E2E] p-2 w-32 text-[2.7vh] rounded pointer-events-auto"> Se connecter
            </button>
        </span>
    </form>
</div>

<script defer>

    <?php if (isset($errors) && empty($errors)): ?>
        if (window.bookmanager == undefined) {
            document.addEventListener("DOMContentLoaded", async () => {
                await new Promise(r => setTimeout(r, 200));
                window.bookmanager.flipNext();
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