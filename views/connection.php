<div
    class="ml-[-200px] bookcover bg-contain bg-no-repeat text-[#FFFFFF] place-self-center font-['Pirata_One'] w-full h-full">

    <h1 class="text-center text-4xl p-16 font-['Pirata_One']
        max-[590px]:p-10
        max-[500px]:p-6"> Connexion </h1>
    <form method="post" action="">
        <span class="flex justify-center items-center p-4 max-[600px]:flex-col">
            <label class="mr-4 text-[2.5vh]">E-mail:</label>
            <input id="mail" type="email" name="mail" placeholder="Veuillez rentrer votre adresse mail"
                class="text-[2.5vh] border-2 w-[25vw] bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex items-center justify-center p-4 max-[600px]:flex-col">
            <label class="mr-4 text-[2.5vh] ">Mot de passe:</label>
            <input type="password" name="motDePasse" placeholder="Veuillez rentrer votre mot de passe"
                class="text-[2.5vh] border-2 w-[25vw] bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>
    </form>

    <span class="flex flex-col items-center space-y-4 mt-16
        max-[640px]:mt-10">
        <button id="connect" type="button" class=" bg-[#2E2E2E] p-4 w-48 rounded pointer-events-auto
            max-[640px]:w-32
            max-[640px]:p-3
            max-[500px]:p-2"> Se connecter
        </button>
        <p class="text-[3vh] h-1"> ou </p>
        </br>
        <button id="register" type="button" class=" bg-[#2E2E2E] p-2 w-32 text-[3vh] rounded pointer-events-auto">
            S'inscrire
        </button>
    </span>

</div>

<script defer>

    btnConnect = document.getElementById("connect");
    btnConnect.addEventListener("click", (event) => {
        window.bookmanager.flipNext();
    });

    btnRegister = document.getElementById("register");
    btnRegister.addEventListener("click", (event) => {
        window.bookmanager.replacePage("./signup.php")
    });
</script>