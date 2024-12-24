<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pop-up</title>
   	<script src="https://cdn.tailwindcss.com"></script>
	<script src="public/script/tailwind.config.js"></script>
    <script defer src="./script/popupitemsinventory.js"></script>
</head>
<body >
    <button onclick="displayInventory()">Cliquer ici</button>
    
    <div id="inventory" class="bg-[#2E2E2E] inset-0 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 size-max">
    <button onclick="hiddenInventory()"  class="float-right bg-[#C4975E] absolute top-2 right-2 rounded w-6 h-6 text-s flex items-center justify-center leading-none ">
  &times;
</button>

    <div >
        
    </div>

    <table id="table" class="border-separate border-spacing-5">
    <tr>
        <td rowspan="4" class="border border-[#C4975E] shadow-md p-0 rounded overflow-hidden w-40 h-40"> /td>
            <img src="img/Potions.jpg" alt="Potions" class="object-cover w-full h-full">
        </td>
    </tr>

            
            <tr>
                <td> <h2> Potion de soin </h2> </td>
            </tr>

            <tr>
                <td> <p> test </p></td>
            </tr>
            
            <tr>
                <td> <button> Utiliser </button> 
                <td> <button> Jeter </button> </td>
            </tr>

        </table>

         
    </div>
    


</body>

</html>