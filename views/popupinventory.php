<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pop-up</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?= FULLURLROOTPATH ?>/public/script/tailwind.config.js"></script>
    <link rel="stylesheet" href="<?= FULLURLROOTPATH ?>/public/style/style.css">
</head>

<body>
    <!-- Background overlay that covers the entire screen -->
    <div class="bg-[#000000d4] h-screen w-screen  text-[#ADADAD]">
        <!-- Pop-up container with specific styling for position, background, and shadow -->
        <div
            class="bg-[#2E2E2E] inset-0 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 size-max w-11/12 max-w-3xl p-4 rounded shadow-lg ">

            <button id="close" class="bg-[#C4975E] rounded w-8 h-8  absolute -top-4 -right-4">
                &times;
            </button>
            <div>
                <table id="table" class="border-separate border-spacing-2 w-full">
                    <tr>

                        <?php for ($i = 0; $i < 8; $i++): ?>
                            <?php if (isset($items[$i])): ?>
                                <th id="<?= $items[$i]['id'] ?>" headers="item ligne 1" value="<?= $items[$i]['id'] ?>"
                                    class="relative hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md  rounded w-[185px] h-[185px]">
                                    <img src="<?= FULLURLROOTPATH ?>/public/assets/<?= $items[$i]['image'] ?>"
                                        class="object-cover w-full h-full rounded">
                                    <?php if ($items[$i]['quantity'] > 1): ?>
                                        <div class="absolute z-20 left-0 top-0 ml-2 text-[#C4975E]">x<?= $items[$i]['quantity'] ?>
                                        </div>
                                    <?php endif ?>
                                </th>
                            <?php else: ?>
                                <th id="<?php $i ?>" headers="item ligne 2"
                                    class="bg-[radial-gradient(60.63%_60.63%_at_38.67%_60.63%,_#1A1A1A_0%,_#2E2E2E_100%)] border border-[#C4975E] shadow-md rounded w-[185px] h-[185px]">
                                </th>
                            <?php endif ?>
                            <?php if ($i == 3): ?>
                            </tr>
                            <tr>
                            <?php endif ?>
                        <?php endfor; ?>
                    </tr>
                </table>
            </div>

            <!-- Display the current weight and number of items in the pop-up -->
            <div class="text-xs flex justify-between ">
                <p>Poids: <?= $weight ?>/15</p>
                <p>Items: <?= count($items); ?>/8</p>
            </div>
        </div>
    </div>



</body>

</html>