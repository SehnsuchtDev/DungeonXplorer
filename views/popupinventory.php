<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pop-up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../public/script/tailwind.config.js"></script>
</head>

<body>
    <div class="bg-[#50505060] h-full w-full">
        <div id=""
            class="bg-[#2E2E2E] inset-0 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 size-max w-11/12 max-w-3xl p-4 rounded shadow-lg ">

            <button id="close" class="bg-[#C4975E] rounded w-8 h-8  absolute -top-4 -right-4">
                &times;
            </button>


            <div>


                <table id="table" class="border-separate border-spacing-2 w-full">
                    <tr>
                        <th
                            class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md   rounded">
                            <img src="../public/assets/Sword01.jpg" alt="Sword01"
                                class="object-cover w-full h-full rounded">
                        </th>
                        <th
                            class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded">
                            <img src="../public/assets/Sword02.png" alt="Sword02"
                                class="object-cover w-full h-full rounded">
                        </th>
                        <th
                            class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded">
                            <img src="../public/assets/Sword03.png" alt="Sword03"
                                class="object-cover w-full h-full rounded">
                        </th>
                        <th
                            class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded">
                            <img src="../public/assets/Potions.jpg" alt="Potions"
                                class="object-cover w-full h-full rounded">
                        </th>
                    </tr>
                    <tr>
                        <th
                            class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded">
                            <img src="../public/assets/Chest01.jpg" alt="Chest01"
                                class="object-cover w-full h-full rounded">
                        </th>
                        <th
                            class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded">
                            <img src="../public/assets/Chest02.jpg" alt="Chest02"
                                class="object-cover w-full h-full rounded">
                        </th>
                        <th
                            class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded">
                        </th>
                        <th
                            class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded">
                        </th>
                    </tr>
                </table>
            </div>


            <div class="text-xs flex justify-between ">
                <p>Capacité: ...%</p>
                <p>Items: .../8</p>
            </div>
        </div>




</body>

</html>