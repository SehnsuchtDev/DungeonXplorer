<div
    id="divConnection" class="ml-[-200px] bookcover bg-contain bg-no-repeat text-[#FFFFFF] place-self-center font-['Pirata_One'] w-full h-full">
    
    <h1 class="text-center text-4xl p-16 font-['Pirata_One']"> Connexion </h1>
    <form id="formulaire-connexion" method="post" action="<?= FULLURLROOTPATH ?>/book/page/login ">
        <span class="flex justify-between items-center p-4 max-[600px]:flex-col">
            <label class="px-4 text-[2.5vh] w-[10vw]">E-mail:</label>
            <input id="mail" type="email" name="email" placeholder="Veuillez rentrer votre adresse mail"
                class="text-[2.5vh] border-2 w-[25vw] bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>

        <span class="flex justify-between items-center p-4 max-[600px]:flex-col">
            <label class="px-4 text-[2.5vh] w-[10vw]">Mot de passe:</label>
            <input type="password" name="password" placeholder="Veuillez rentrer votre mot de passe"
                class=" text-[2.5vh] border-2 w-[25vw] bg-[#2E2E2E] rounded text-center pointer-events-auto z-0">
        </span>
    

    <span class="flex flex-col items-center space-y-4 mt-16">
        <input id="connect" type="submit" value="Se connecter" class=" bg-[#2E2E2E] p-4 w-48 rounded pointer-events-auto"> 
    </input>
        <p class="text-[2.2vh] h-1"> ou </p>
        <button id="register" type="button"
            class=" bg-[#2E2E2E] p-2 w-32 m-100 text-[2.2vh] rounded pointer-events-auto"> S'inscrire
        </button>
    </span>

    </form>

</div>

<script defer>


            <?php if(isset($errors) && empty($errors)): ?>
                if(window.bookmanager == undefined){
                    document.addEventListener("DOMContentLoaded",async()=>{
                    await new Promise(r => setTimeout(r, 200));
                    window.bookmanager.flipNext();
                });
                }
                else{
                    window.location.reload();
                }
                
                <?php elseif(isset($errors)): ?>
                    let str = "";
                    <?php foreach($errors as $e): ?>
                        str += "<?=$e?>\n";
                    <?php endforeach ?>
                    alert(str);
                <?php endif; ?>

    /*btnConnect = document.getElementById("connect");
    btnConnect.addEventListener("click", (event) => {
        window.bookmanager.flipNext();
    });*/

    document.getElementById("formulaire-connexion").addEventListener("submit",(event)=>{
        event.preventDefault();
        const formData = new FormData(event.target);
        bookmanager.refreshDivWithPostMethod(event.target.action, formData,"divConnection");
    });
        

    btnRegister = document.getElementById("register");
    btnRegister.addEventListener("click", (event) => {
        window.bookmanager.replacePage("book/page/signup");
    });
</script>