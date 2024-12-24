<div class="bookcover text-[#FFFFFF] place-self-center font-['Pirata_One'] w-full h-full">
    <h1 class="text-center text-4xl p-16"> Inscription </h1>
    <form method="post" action="">
        <span class="flex justify-between items-center p-4 max-[600px]:flex-col">
            <label class="px-4 text-[2.5vh] w-[10vw]">Pseudo:</label>
            <input type="text" name="pseudo" placeholder="Veuillez rentrer votre pseudo"
                class="text-[2.5vh] border-2 w-[25vw] bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex justify-between items-center p-4 max-[600px]:flex-col">
            <label class="px-4 text-[2.5vh] w-[10vw]">E-mail:</label>
            <input type="email" name="mail" placeholder="Veuillez rentrer votre adresse mail"
                class="text-[2.5vh] border-2 w-[25vw] bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex justify-between items-center p-4 max-[600px]:flex-col">
            <label class="px-4 text-[2.5vh] w-[10vw]">Mot de passe:</label>
            <input type="password" name="motDePasse" placeholder="Veuillez rentrer votre mot de passe"
                class="text-[2.5vh] border-2 w-[25vw] bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>
    </form>
    <span class="flex flex-col items-center space-y-4 mt-16">
        <button id="register" type="button" class=" bg-[#2E2E2E] p-4 w-48  rounded pointer-events-auto"> S'inscrire
        </button>
        <p class="text-[2.2vh] h-1"> ou </p>
        <button id="connect" type="button"
            class=" bg-[#2E2E2E] p-2 w-32 m-100 text-[2.2vh] rounded pointer-events-auto"> Se connecter
        </button>
    </span>
</div>

<script defer>

    btnRegister = document.getElementById("register");
    btnRegister.addEventListener("click", (event) => {
        window.bookmanager.flipNext();
        window.bookmanager.center();
    });

    btnConnect = document.getElementById("connect");
    btnConnect.addEventListener("click", (event) => {
        window.bookmanager.replacePage("./connection.php");
    });
</script>