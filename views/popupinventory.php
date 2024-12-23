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
    
    <div id="inventory" class="bg-[#2E2E2E] inset-0 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 size-max">
    <button  onclick="hiddenInventory()" class="float-right bg-[#C4975E] absolute top-2 right-2 rounded w-6 h-6"> &times; </button>
    <table id="table" class="border-separate border-spacing-5 p-5">
        <tr>
            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md p-0 w-10 h-10 rounded"> <img src="./img/Sword01.jpg" alt="Sword01" class="object-cover"> </th>
            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md p-0 w-10 h-10 rounded"> <img src="./img/Sword02.png" alt="Sword02" class="object-cover"> </th>
            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md p-0 w-10 h-10 rounded"> <img src="./img/Sword03.png" alt="Sword03" class="object-cover"> </th>
            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md p-0 w-10 h-10 rounded"> <img src="./img/Potions.jpg" alt="Potions" class="object-cover"> </th>
        </tr>
        
        <tr>
        <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md p-0 w-10 h-10 rounded"> <img src="./img/Chest01.jpg" alt=" Chest01" class="object-cover"> </th>
            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md p-0 w-10 h-10 rounded"> <img src="./img/Chest02.jpg" alt="Chest02" class="object-cover"> </th>
            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md p-0 w-10 h-10 rounded"> </th>
            <th class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md p-0 w-10 h-10 rounded">  </th>
        </tr>

    </table>
    </div>
    


</body>

</html>