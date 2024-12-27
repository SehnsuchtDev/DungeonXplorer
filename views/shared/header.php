
<?php
    if(session_status()!=PHP_SESSION_ACTIVE) session_start();
?>
<!DOCTYPE html>
<header class="bg-[#2e2e2e] flex flex-row justify-between">

    <div class="flex flex-row">
       <a href="<?= FULLURLROOTPATH ?>"><img src="<?= FULLURLROOTPATH ?>/public/assets/Logo.png" title="logoDungeonXplorer" class="size-28
            max-[380px]:size-24
            max-[380px]:self-center"> </a>
        <span class="material-icons my-auto ml-7 text-[#e5e5e5] 
            max-[615px]:invisible
            max-[615px]:absolute">
            <a href="<?= FULLURLROOTPATH ?>/account">person</a>
        </span>
        <p class="font-['Pirata_One'] text-[#e5e5e5] text-2xl ml-2 my-auto 
            max-[615px]:invisible
            max-[615px]:absolute">
            <?php 
                if(isset($_SESSION['user'])){
                    $user = $_SESSION['user']->getName();
                    echo "Bienvenue, " . $user . "!";
                }
                else{
                    echo "Bienvenue, invité !";
                }
            ?>
            </p>
    </div>

    <div class="flex flex-row space-w">
        
        <div class="bg-[#C4975E] my-7 mx-6 place-content-center rounded-lg 
            max-[615px]:invisible
            max-[615px]:absolute" >

            <?php if(isset($_SESSION["user"])) : ?>
            <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">
                Mode Histoire 
            </p> 
            <?php endif; ?>
            
        </div>
        
        <div class="bg-[#C4975E] my-7 mx-6 place-content-center rounded-lg 
            max-[615px]:invisible">
            <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">     
            <?php if(isset($_SESSION["user"])) : ?>
                <a href="<?= FULLURLROOTPATH?>/logout">    
                Se déconnecter</a>
                
            <?php else : ?>
                <a href="<?= FULLURLROOTPATH?>/book"> Se connecter</a>
            <?php endif; ?>
            </p>
        </div>

        <div class="bg-[#C4975E] p-3 my-7 mx-4 right-1 place-content-center rounded-lg absolute invisible
            max-[615px]:visible">
            <span class="material-symbols-outlined">
                menu
            </span>
        </div>
        <div class="bg-[#C4975E] absolute invisible p-3 rounded m-2 mt-24 z-30 max-[615px]:visible"> <!-- max-[615px]:visible -->
            <div class="flex flex-row">
                <span class="material-icons text-[#e5e5e5]">
                    person
                </span>
                <p class="font-['Pirata_One'] text-[#e5e5e5] ml-2">Username</p>
            </div>
            <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">Mode Histoire</p>
            <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">Se déconnecter</p>
        </div>

    </div>

</header>
