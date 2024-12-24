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
    <button onclick="hiddenInventory()"  class="float-right bg-[#C4975E] absolute top-2 right-2 rounded w-6 h-6 text-s flex items-center justify-center leading-none ">
  &times;
</button>

    <div >
        
    </div>

        <table id="table" class="border-separate border-spacing-5 p-10">
           
        </table>
         
    </div>
    


</body>

</html>