<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="./style/style.css">
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="public/script/tailwind.config.js"></script>
</head>
<body class="bg-[#000000] text-[#FFFFFF]">
    
    <div class="place-self-center  bg-[#582900]">
        <h1 class="text-center text-4xl p-16"> Inscription </h1> 
        <form method="post" action="">
            <div class="flex justify-between items-center p-4 max-[600px]:flex-col">
                    <label class="px-5">Votre pseudo:</label>
                    <input type="text" name="pseudo" placeholder="Veuillez rentrer pseudo" class="border-2 w-[30vw] bg-[#2E2E2E] rounded text-center">
            </div> 

            <div class="flex justify-between items-center p-4 max-[600px]:flex-col">
                    <label class="px-5">Votre adresse mail:</label>
                    <input type="email" name="mail" placeholder="Veuillez rentrer votre adresse mail" class="border-2 w-[30vw] bg-[#2E2E2E] rounded text-center">
            </div>

            <div class="flex justify-between items-center p-4 max-[600px]:flex-col">
                    <label class="px-5">Votre mot de passe:</label>
                    <input type="password" name="motDePasse" placeholder="Veuillez rentrer votre mot de passe" class="border-2 w-[30vw] bg-[#2E2E2E] rounded text-center">
            </div> 
        </form>
        <div class="flex flex-col items-center space-y-4 p-32">
            <button class=" bg-[#2E2E2E] p-4 w-48  rounded"> S'inscrire </button> 
            <p> ou </p> 
            <button class=" bg-[#2E2E2E] p-4 w-48 rounded" > Se connecter </button> 
        </div>
        
    </div> 
</body>
</html>