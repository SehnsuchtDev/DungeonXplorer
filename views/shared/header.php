<<<<<<< HEAD
<!-- header -->
<?php
if (session_status() != PHP_SESSION_ACTIVE)
    session_start();
?>
=======
>>>>>>> 92a2ac1b5d7d28db19a5ca04fd759092f061fe7e
<header class="bg-[#2e2e2e] flex flex-row justify-between">

    <div class="flex flex-row">
        <a href="<?= FULLURLROOTPATH ?>" title="lien vers page accueil">
            <img src="<?= FULLURLROOTPATH ?>/public/assets/Logo.png" title="logo DungeonXplorer"
                alt="logo DungeonXplorer" class="size-28
            max-[380px]:size-24 max-[380px]:self-center"> </a>

        <span class="material-icons my-auto ml-7 text-gray-600 bg-[#C4975E] rounded-[5px] text-2xl w-8 text-center
            max-[615px]:invisible max-[615px]:absolute">
            <a href="<?= FULLURLROOTPATH ?>/account">person</a>
        </span>
        <p class="font-['Pirata_One'] text-[#e5e5e5] text-2xl ml-2 my-auto
            max-[615px]:invisible
            max-[615px]:absolute">
            <?php
            if (isset($_SESSION['user'])) {
                $user = $_SESSION['user']->getName();
                echo "Bienvenue, " . $user . "!";
            } else {
                echo "Bienvenue, invité !";
            }
            ?>
        </p>
    </div>

    <div class="flex flex-row space-w">

        <?php if (isset($_SESSION["user"])): ?>
            <a href="<?= FULLURLROOTPATH ?>/book"
                class="bg-[#C4975E] my-7 mx-6 place-content-center rounded-lg max-[615px]:invisible max-[615px]:absolute">
                <p class="font-['Pirata_One'] text-2xl mx-3 text-[#e5e5e5]">Mode Histoire</p>
            </a>
        <?php endif; ?>

        <a class="bg-[#C4975E] my-7 mx-6 place-content-center rounded-lg
                max-[615px]:invisible font-['Pirata_One'] text-2xl mx-3 text-[#e5e5e5]"
            href="<?= FULLURLROOTPATH . '/' . (array_key_exists('user', $_SESSION) ? 'logout' : 'book') ?>">
            <p class="font-['Pirata_One'] mx-3 text-[#e5e5e5]">
                <?= array_key_exists('user', $_SESSION) ? 'Se déconnecter' : 'Se connecter' ?>
            </p>
        </a>

        <div class="bg-[#C4975E] p-3 my-7 mx-4 right-1 place-content-center rounded-lg absolute invisible
            max-[615px]:visible">
            <span class="material-symbols-outlined">
                menu
            </span>
        </div>

        <div class="bg-[#C4975E] absolute invisible p-3 rounded m-2 mt-24 z-30">
            <!-- max-[615px]:visible -->
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