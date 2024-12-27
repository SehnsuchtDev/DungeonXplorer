<!-- hero's data bar -->
<div id="hero-data">
    <div class="w-[90%] ml-9 flex flex-col items-center justify-center font-['Pirata_One'] text-[#ADADAD] text-[5vh]">

        <!-- <div class="w-[800px] flex flex-row"> -->

        <div class="flex flex-row justify-between">
            <div class="flex flex-row items-center max-[615px]:flex-col">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/health_icon.svg" alt="Icône vie"
                    width="40"
                    class="max-[790px]:max-w-10 max-[700px]:max-w-8 max-[580px]:max-w-6 max-[615px]:rotate-90">
                <p class="ml-2 mr-10 max-[615px]:rotate-90
                        max-[600px]:mr-3
                        max-[600px]:ml-1
                        max-[560px]:text-xl"><?= $hero['pv'] ?></p>
            </div>
            <div class="flex flex-row items-center max-[615px]:flex-col">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/strength_icon.png" alt="Icône énergie"
                    width="40"
                    class="max-[790px]:max-w-10 max-[700px]:max-w-8 max-[580px]:max-w-6 max-[615px]:rotate-90">
                <p class="ml-2 mr-10 max-[615px]:rotate-90
                        max-[600px]:mr-3
                        max-[600px]:ml-1
                        max-[560px]:text-xl"><?= $hero['strength'] ?></p>
            </div>
            <?php if (isset($hero['mana'])): ?>
                <div class="flex flex-row items-center max-[615px]:flex-col">
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/energy_icon.svg" alt="Icône énergie"
                        width="40"
                        class="max-[790px]:max-w-10 max-[700px]:max-w-8 max-[580px]:max-w-6 max-[615px]:rotate-90">
                    <p class="ml-2 mr-10 max-[615px]:rotate-90
                            max-[600px]:mr-3
                            max-[600px]:ml-1
                            max-[560px]:text-xl"><?= $hero['mana'] ?></p>
                </div>
            <?php endif; ?>
            <div class="flex flex-row items-center max-[615px]:flex-col">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/initiative_icon.png"
                    alt="Icône Initiative" width="40"
                    class="max-[790px]:max-w-10 max-[700px]:max-w-8 max-[580px]:max-w-6 max-[615px]:rotate-90">
                <p class="ml-2 mr-10 max-[615px]:rotate-90
                        max-[600px]:mr-3
                        max-[600px]:ml-1
                        max-[560px]:text-xl"><?= $hero['initiative'] ?></p>
            </div>
            <div class="flex flex-row items-center max-[615px]:flex-col">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/defense_icon.svg" alt="Icône défense"
                    width="40"
                    class="max-[790px]:max-w-10 max-[700px]:max-w-8 max-[580px]:max-w-6 max-[615px]:rotate-90">
                <p class="ml-2 mr-10 max-[615px]:rotate-90
                        max-[600px]:mr-3
                        max-[600px]:ml-1
                        max-[560px]:text-xl"><?= $hero['armor'] ?></p>
            </div>
            <div class="flex flex-col items-center max-[615px]:rotate-90">
                <p class="text-[2.5vh]">Niveau&nbsp;<?= $hero['level'] ?></p>
                <p class="text-[2.5vh]">Xp:&nbsp;<?= $hero['xp'] ?></p>
            </div>


            <!--</div>-->


            <div class="flex flex-row items-center mr-10 max-[420px]:mr-2">

                <!--<div class="flex flex-row items-center">-->
                <?php if (isset($primaryWeaponImage)): ?>
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/<?= $primaryWeaponImage ?>" alt="Arme primaire"
                        width="50" class="mr-[1vw] border border-[#C4975E] hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] rounded
                            max-[615px]:rotate-90
                            max-[560px]:w-[8vw]" id="primary-weapon" aria-details="<?= $primaryWeaponId ?>">
                <?php endif; ?>
                <?php if (isset($secondaryWeaponImage)): ?>
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/<?= $secondaryWeaponImage ?>" alt="Arme secondaire"
                        width="30" class="mr-[1vw] border border-[#C4975E] hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] rounded
                            max-[615px]:rotate-90" id="secondary-weapon" aria-details="<?= $secondaryWeaponId ?>">
                <?php endif; ?>
                <?php if (isset($armorImage)): ?>
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/<?= $armorImage ?>" alt="Armure équipée" width="30"
                        class="border border-[#C4975E] hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] rounded
                            max-[615px]:rotate-90" id="equipped-armor" aria-details="<?= $armorId ?>">
                <?php endif; ?>
            </div>

            <button id="inventory-button">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/inventory_icon.svg" alt="Inventory icon"
                    width="50" class=" max-[615px]:rotate-90 ml-6
                        max-[600px]:ml-3
                        max-[560px]:w-[8vw]
                        max-[560px]:ml-2">
                <!-- max-[790px]:max-w-10 max-[700px]:max-w-8 -->
            </button>

            <!-- </div> -->
        </div>
    </div>
</div>
<script> //Defer
    let updateStatusBar = () => {
        fetch('<?= FULLURLROOTPATH ?>/book/statusbar')
            .then(response => response.text())
            .then(data => {
                document.getElementById('hero-data').innerHTML = data;
                inventoryButton();
            });
    }
    window.book.updateStatusBar = updateStatusBar;

    document.addEventListener("DOMContentLoaded", inventoryButton);

    function inventoryButton() {
        let button = document.getElementById("inventory-button");
        let primary = document.getElementById("primary-weapon");
        let secondary = document.getElementById("secondary-weapon");
        let armor = document.getElementById("equipped-armor");

        button.id = ""

        // inventory button in the hero bar

        button.addEventListener("click", displayInventory);
        // weapon buttons in the hero bar

        if (primary) {
            primary.id = "";
            primary.addEventListener("click", () => {
                openItemDetails(primary.getAttribute("aria-details"));
                displayPopup();
            });
        }

        if (secondary) {
            secondary.id = "";
            secondary.addEventListener("click", () => {
                openItemDetails(secondary.getAttribute("aria-details"));
                displayPopup();
            });
        }

        if (armor) {
            armor.id = "";
            armor.addEventListener("click", () => {
                openItemDetails(armor.getAttribute("aria-details"));
                displayPopup();
            });
        }
    }
</script>