<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pop-up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/script/tailwind.config.js"></script>
</head>

<body>

    <div id="inventory"
        class="bg-[#2E2E2E] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 size-max fixed  inset-0  max-w-xl rounded">
        <button id="close"
            class="float-right bg-[#C4975E] absolute top-2 right-2 rounded w-6 h-6 text-s flex items-center justify-center leading-none ">
            &times;
        </button>

        <div class="bg-[#1A1A1A] rounded">

            <table id="table" class="border-separate border-spacing-5 bg-[#1A1A1A] rounded w-full h-full">

                <tr>
                    <td rowspan="3" class="border border-[#C4975E] rounded overflow-hidden">
                        <img src="../public/assets/Potions.jpg" alt="Potions" class="object-cover w-full h-full">
                    </td>
                    <td>
                        <p class="text-lg font-bold text-white">Potion de soin</p>
                        <p class="text-lg font-bold text-[#C4975E]">x5</p>
                    </td>
                </tr>


                <tr>
                    <td>
                        <p class="text-sm text-gray-300">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas nisi quisquam error fugit
                            dicta assumenda molestias animi quo praesentium nihil, ipsa perspiciatis nobis aliquid,
                            laborum ea aliquam. At, placeat itaque.
                        </p>
                    </td>
                </tr>


                <tr>
                    <td>
                        <div class=" text-white  px-3 py-1">
                            <button class="bg-[#4A7A66] hover:bg-[#3B6253] rounded">Utiliser</button>
                            <button class="bg-[#8B1E1E] hover:bg-[#6E1818] rounded">Jeter</button>
                            <button id="back" class="bg-[#ADADAD] hover:bg-[#1A1A1A] rounded hidden">Retour</button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>


    </div>



</body>

</html>