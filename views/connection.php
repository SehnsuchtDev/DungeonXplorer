<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="./style/style.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="public/script/tailwind.config.js"></script>
</head>
<body class="bg-[#000000] text-[#FFFFFF]">
    
    <div class="place-self-center  bg-[#582900]">
        <h1 class="text-center text-4xl p-16"> Connexion </h1> 
        <form method="post" action="">
            <div class="p-4 ">
                <label class="px-5">Votre adresse mail:</label> 
                <input type="email" name="mail" placeholder="Veuillez rentrer votre adresse mail" class="border-2 w-[30vw] bg-[#2E2E2E] rounded text-center">
            </div>
            
            <div class="px-4 py-4">
                <label class="px-4">Votre mot de passe:</label>
                <input type="password" name="motDePasse" placeholder="Veuillez rentrer votre mot de passe" class="border-2 w-[30vw] bg-[#2E2E2E] rounded text-center">
            </div>
        </form>

        <div class="flex flex-col items-center space-y-4 p-32">
            <button class=" bg-[#2E2E2E] p-4 w-48  rounded"> Se connecter </button> 
            <p> ou </p> 
            <button class=" bg-[#2E2E2E] p-4 w-48 rounded" > S'inscrire </button> 
        </div>
        
    </div> 
</body>
</html>