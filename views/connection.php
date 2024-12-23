<div class="bg-[#000000] text-[#FFFFFF] flex justify-between items-center font-['Pirata_One']">


    <h1 class="text-center text-4xl p-16 font-['Pirata_One']"> Connexion </h1>
    <form method="post" action="">
        <span class="flex justify-between items-center p-4 max-[600px]:flex-col">
            <label class="px-4 text-[2.5vh] w-[10vw]">E-mail:</label>
            <input type="email" name="mail" placeholder="Veuillez rentrer votre adresse mail"
                class="text-[2.5vh] border-2 w-[25vw] bg-[#2E2E2E] rounded text-center ">
        </span>

        <span class="flex justify-between items-center p-4 max-[600px]:flex-col">
            <label class="px-4 text-[2.5vh] w-[10vw]">Mot de passe:</label>
            <input type="password" name="motDePasse" placeholder="Veuillez rentrer votre mot de passe"
                class=" text-[2.5vh] border-2 w-[25vw] bg-[#2E2E2E] rounded text-center">
        </span>
    </form>

    <span class="flex flex-col items-center space-y-4 mt-16">
        <button id="connecter" class=" bg-[#2E2E2E] p-4 w-48  rounded pointer-events-auto"> Se connecter </button>
        <p class="text-[2.2vh] h-1"> ou </p>
        <button class=" bg-[#2E2E2E] p-2 w-32 m-100 text-[2.2vh] rounded pointer-events-auto"> S'inscrire
        </button>
    </span>

</div>

<script defer>

    btnContinue = document.getElementById("connecter");
    btnContinue.removeAttribute("id");
    btnContinue.addEventListener("click", () => {
        window.bookmanager.flipNext()
    });
</script>