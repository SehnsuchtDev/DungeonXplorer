<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DungeonXPlorer</title>
    <link rel="stylesheet" href="./style/style.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="./script/tailwind.config.js"></script>
</head>
<body class="bg-[#1a1a1a]">
    <!-- HEADER -->
    <?php include('header.php'); ?>

    <!-- ACCUEIL -->

    <img src="..\public\assets\castle.png" alt="Castle" title="Castle" class="z-0 max-w-[55%] absolute right-0"/>
    
    <main class="z-20 relative">
        <h1 class="font-['Pirata_One'] text-[#e5e5e5] text-center m-[3em] text-4xl [text-shadow:_0_3px_0_rgb(0_0_0_/_60%)]
            max-[440px]:m-[1em]">DungeonXplorer</h1>

        <div class="bg-[rgba(46,46,46,0.80)] place-self-center max-w-[50em] rounded text-[#e5e5e5] font-['Roboto'] p-12 m-24 text-center text-xl">
            <p>
                Bienvenue sur DungeonXplorer, l'univers de dark fantasy où se mêlent aventure, 
                stratégie et immersion  totale dans les récits interactifs.
            </p>
            </br>
            <p class="text-[#C4975E]">
                COMMENCER L'AVENTURE
            </p>
        </div>

        <div class="bg-[rgba(46,46,46,0.80)] place-self-center max-w-[50em] rounded text-[#e5e5e5] font-['Roboto'] p-12 m-24 text-center text-xl flex 
                max-[800px]:flex-col
                max-[400px]:text-lg
                max-[330px]:p-8">
            <img src="..\public\assets\logo.webp" alt="Logo Association" title="Logo Association" class="max-w-48 m-5
                max-[800px]:self-center 
                max-[400px]:max-w-36"/>
            <p class="text-justify m-5 content-center">
                Ce projet est né de la volonté de l’association Les Aventuriers du Val Perdu de 
                raviver l’expérience unique  des livres dont vous êtes le héros. Notre vision : 
                offrir à la communauté un espace où chacun peut  incarner un personnage et 
                plonger dans des quêtes épiques et personnalisées.
            </p>
        </div>

    </main>

    <img src="..\public\assets\dungeon.png" alt="Dungeon" title="Dungeon" class="z-0 max-w-[50%] absolute left-0 mt-20"/>

    <main class="z-20 relative">

        <div class="bg-[rgba(46,46,46,0.80)] place-self-center max-w-[50em] rounded text-[#e5e5e5] font-['Roboto'] px-12 m-24 text-center text-xl flex
                max-[800px]:flex-col
                max-[400px]:text-lg
                max-[330px]:p-8">
            <p class="text-justify m-5 content-center">
                Dans sa première version, DungeonXplorer permettra aux joueurs de créer un personnage 
                parmi trois  classes emblématiques — guerrier, voleur, magicien — et d’évoluer dans 
                un scénario captivant, tout en  assurant à chacun la possibilité de conserver sa 
                progression.
            </p>
            <img src="..\public\assets\knight.png" alt="knight" title="knight" class="max-w-48 m-5
                max-[800px]:self-center
                max-[400px]:max-w-36"/>
        </div>

        <div class="bg-[rgba(46,46,46,0.80)] place-self-center max-w-[50em] rounded text-[#e5e5e5] font-['Roboto'] p-12 m-24 text-center text-xl flex flex-col items-center
            max-[500px]:m-12">
            <p>
                Nous sommes enthousiastes de partager avec vous cette application et espérons qu'elle saura 
                vous  plonger au cœur des mystères du Val Perdu !
            </p>
            </br>
            <span class="flex justify-between w-full max-w-72 text-[#C4975E] text-2xl
                max-[500px]:flex-col">
                <p class=""> Connexion </p>
                <p class="text-[#e5e5e5] max-[500px]:invisible" >|</p>
                <p class=""> Inscription </p>
            </span>
            
        </div>
    </main>

</body>
</html>