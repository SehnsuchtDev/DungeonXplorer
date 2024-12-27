<div id="divConnection"
    class="pagediv ml-[200px] bookcover bg-contain bg-no-repeat text-[#FFFFFF] place-self-center font-['Pirata_One'] w-full h-full">

    <h1 class="text-center text-4xl p-12 font-['Pirata_One']
        max-[590px]:p-10
        max-[500px]:p-6"> Connexion </h1>
    <form id="formulaire-connexion<?= $seed ?>" method="post" action="<?= FULLURLROOTPATH ?>/book/page/login">
        <span class="flex justify-between items-center p-2 flex-col">
            <label class="text-[2.5vh] m-3">E-mail:</label>
            <input id="mail" type="email" name="email" placeholder="Veuillez rentrer votre adresse mail"
                class="text-[2.5vh] border-2 w-[25vw] min-w-64 bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex justify-between items-center p-2 flex-col">
            <label class="text-[2.5vh] m-3">Mot de passe:</label>
            <input type="password" name="password" placeholder="Veuillez rentrer votre mot de passe"
                class=" text-[2.5vh] border-2 w-[25vw] min-w-64 bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>


        <span class="flex flex-col items-center space-y-3 mt-16
            max-[640px]:mt-10">
            <input type="submit" value="Se connecter" class=" bg-[#2E2E2E] p-4 w-40 rounded pointer-events-auto
                max-[640px]:w-32
                max-[640px]:p-3
                max-[500px]:p-2" />
            <p class="text-[3vh] h-1 pb-4"> ou </p>
            <button id="register<?= $seed ?>" type="button"
                class=" bg-[#2E2E2E] p-2 w-32 text-[3vh] rounded pointer-events-auto"> S'inscrire
            </button>
        </span>

    </form>

</div>

<script defer>


        <?php if(isset($errors) && empty($errors)): ?>
            if(window.bookmanager == undefined){
                document.addEventListener("DOMContentLoaded",async()=>{
                    await new Promise(r => setTimeout(r, 300));
                    window.bookmanager.loadTwoPageAndTurn("<?= FULLURLROOTPATH?>/book/page/hero/p1", "<?= FULLURLROOTPATH?>/book/page/hero/p2");
                });
            }
            else{
                window.location.reload();
            }

    <?php elseif (isset($errors)): ?>
        str = "";
        <?php foreach ($errors as $e): ?>
            str += "<?= $e ?>\n";
        <?php endforeach ?>
        alert(str);
    <?php endif; ?>


    document.getElementById("formulaire-connexion<?= $seed ?>").addEventListener("submit", (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);
        bookmanager.refreshDivWithPostMethod(event.target.action, formData, "divConnection");
    });


    document.getElementById("register<?= $seed ?>").addEventListener("click", (event) => {
        window.bookmanager.replacePage("book/page/signup");
    });
</script>