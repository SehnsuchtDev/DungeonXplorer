<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pop-up</title>
   	<script src="https://cdn.tailwindcss.com"></script>
	<script src="public/script/tailwind.config.js"></script>
    <script defer src="./script/popupinventory.js"></script>
</head>
<body >
    <button onclick="displayInventory()">Cliquer ici</button>
    <div id="inventory" class="bg-[#2E2E2E]">
        <table id="table" class="border-separate border-spacing-5  ">
           
        </table>
        
    </div>
</body>

</html>