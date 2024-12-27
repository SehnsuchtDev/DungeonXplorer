<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pop-up detail inventaire</title>
    <link rel="stylesheet" href="<?= FULLURLROOTPATH ?>/public/style/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?= FULLURLROOTPATH ?>/public/script/tailwind.config.js"></script>
</head>

<body>
    <!-- Dark background overlay that covers the full screen -->
    <div class="bg-[#000000d4] h-screen w-screen  text-[#ADADAD]">
        <!-- Inventory pop-up window centered on the screen -->
        <div id="inventory"
            class="bg-[#2E2E2E] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 size-max fixed  inset-0  max-w-xl rounded">
            <button id="back"
                class="float-right bg-[#C4975E] absolute top-2 right-2 rounded w-6 h-6 text-s flex items-center justify-center leading-none ">
                &times;
            </button>

            <div class="bg-[#1A1A1A] rounded ">

                <table id="table" class="border-separate border-spacing-5 bg-[#1A1A1A] rounded ">

<<<<<<< HEAD
                    <tr>
                        <td rowspan="3" class="border border-[#C4975E] rounded overflow-hidden ">
                            <img src="<?= FULLURLROOTPATH ?>/public/assets/<?= $item['image'] ?>" alt="Item image"
                                class="object-cover w-[256px]">
                        </td>
                        <td>
                            <p class="text-lg font-bold text-[#E5E5E5]"><?= $item['name'] ?></p>
                            <?php if (array_key_exists('quantity', $item)): ?>
                                <p class="text-lg font-bold text-[#C4975E]">x<?= $item['quantity'] ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <p class="text-sm text-[#E5E5E5]">
                                <?= $item['desc'] ?>
                            </p>
                        </td>
                    </tr>
=======
                <tr>
                    <td rowspan="3" class="border border-[#C4975E] rounded overflow-hidden w-[256px] h-[256px]">
                        <img src="<?=FULLURLROOTPATH?>/public/assets/<?=$item['image']?>" alt="Item image" class="object-cover w-full h-full">
                    </td>
                    <td>
                        <p class="text-lg font-bold text-[#E5E5E5]"><?=$item['name']?></p>
                        <?php if(array_key_exists('quantity',$item)): ?>
                            <p class="text-lg font-bold text-[#C4975E]">x<?=$item['quantity']?></p>
                        <?php endif;?>
                    </td>
                </tr>


                <tr>
                    <td>
                        <p class="text-sm max-w-96 text-[#E5E5E5]">
                            <?=$item['desc']?>
                        </p>
                    </td>
                </tr>
>>>>>>> 92a2ac1b5d7d28db19a5ca04fd759092f061fe7e


                    <tr>
                        <td>
                            <div class=" text-[#E5E5E5]  px-3 py-1">
                                <?php if (array_key_exists('usable', $item) && $item['usable']): ?>
                                    <a href="<?= FULLURLROOTPATH ?>/inventory/use/<?= $item['id'] ?>"
                                        class="inv-btn bg-[#4A7A66] hover:bg-[#3B6253] rounded p-1">Utiliser</a>
                                <?php elseif (array_key_exists('handitem', $item) && $item['handitem']): ?>
                                    <a href="<?= FULLURLROOTPATH ?>/inventory/equip/<?= $item['id'] ?>/primaryweapon"
                                        class="inv-btn bg-[#4A7A66] hover:bg-[#3B6253] rounded p-1">Equiper en Arme
                                        principale</a>
                                    <br><br>
                                    <a href="<?= FULLURLROOTPATH ?>/inventory/equip/<?= $item['id'] ?>/secondaryweapon"
                                        class="inv-btn bg-[#4A7A66] hover:bg-[#3B6253] rounded p-1">Equiper en Arme
                                        secondaire</a>
                                    <br><br>
                                <?php elseif (array_key_exists('armor', $item) && $item['armor']): ?>
                                    <a href="<?= FULLURLROOTPATH ?>/inventory/equip/<?= $item['id'] ?>/armor"
                                        class="inv-btn bg-[#4A7A66] hover:bg-[#3B6253] rounded p-1 ">Equiper</a>
                                <?php endif; ?>
                                <?php if (isset($inventory) && $inventory): ?>
                                    <a class="inv-btn bg-[#8B1E1E] hover:bg-[#6E1818] rounded p-1"
                                        href="<?= FULLURLROOTPATH ?>/inventory/drop/<?= $item['id'] ?>">Jetter</a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <!-- JavaScript to handle item actions -->
    <script>
        for (let e of document.querySelectorAll(".inv-btn")) {
            e.addEventListener("click", (event) => {
                event.preventDefault();
                fetch(e.href).then(() => {
                    window.location = "<?= FULLURLROOTPATH ?>/book/inventory";
                })
            })
        }
    </script>
</body>

</html>