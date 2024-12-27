<div id="hero-data">
    <div class="w-[90%] ml-9 flex flex-col items-center justify-center font-['Pirata_One'] text-[#ADADAD] text-[5vh]">
        <!-- max-[776px]:w-[92%]
        max-[700px]:w-[85%]
        max-[635px]:w-[80%]
        max-[580px]:w-[75%]
        max-[545px]:w-[70%]  -->

        <div class="w-[800px] flex flex-row">

            <div class="flex flex-row justify-between w-[70%]">
                <div class="flex flex-row items-center">
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/health_icon.svg" alt="Icône vie" width="40 vw"
                        class="max-[790px]:max-w-10 max-[700px]:max-w-8 max-[580px]:max-w-6 max-[615px]:rotate-90">
                    <p class="ml-2 mr-10 max-[615px]:rotate-90"><?=$hero['pv']?></p>
                </div>
                <div class="flex flex-row items-center">
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/strength_icon.png" alt="Icône énergie" width="40 vw"
                        class="max-[790px]:max-w-10 max-[700px]:max-w-8 max-[580px]:max-w-6 max-[615px]:rotate-90">
                    <p class="ml-2 mr-10 max-[615px]:rotate-90"><?=$hero['strength']?></p>
                </div>
                <?php if(isset($hero['mana'])):?>
                    <div class="flex flex-row items-center">
                        <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/energy_icon.svg" alt="Icône énergie" width="40 vw"
                            class="max-[790px]:max-w-10 max-[700px]:max-w-8 max-[580px]:max-w-6 max-[615px]:rotate-90">
                        <p class="ml-2 mr-10 max-[615px]:rotate-90"><?=$hero['mana']?></p>
                    </div>
                <?php endif;?>
                <div class="flex flex-row items-center">
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/initiative_icon.png" alt="Icône énergie" width="40 vw"
                        class="max-[790px]:max-w-10 max-[700px]:max-w-8 max-[580px]:max-w-6 max-[615px]:rotate-90">
                    <p class="ml-2 mr-10 max-[615px]:rotate-90"><?=$hero['initiative']?></p>
                </div>
                <div class="flex flex-row items-center">
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/defense_icon.svg" alt="Icône défense" width="40 vw"
                        class="max-[790px]:max-w-10 max-[700px]:max-w-8 max-[580px]:max-w-6 max-[615px]:rotate-90">
                    <p class="ml-2 mr-10 max-[615px]:rotate-90"><?=$hero['armor']?></p>
                </div>
                <div class="flex flex-col items-center max-[615px]:rotate-90">
                    <p class="text-[2.5vh]">Niveau&nbsp<?=$hero['level']?></p>
                    <p class="text-[2.5vh]">Xp:&nbsp<?=$hero['xp']?></p>
                </div>


            </div>


            <div class="ml-10 w-[30%] flex flex-row-reverse justify-evenly
                ">
                <!-- max-[790px]:ml-5
                max-[776px]:w-[32%]
                max-[700px]:w-[25%]
                max-[635px]:w-[20%]
                max-[580px]:w-
                max-[545px]:w-[30%] -->

                <button id="inventory-button">
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/inventory_icon.svg" alt="Inventory icon" width="50 vw"
                        class=" max-[615px]:rotate-90">
                    <!-- max-[790px]:max-w-10 max-[700px]:max-w-8 -->
                </button>
                <div class="flex flex-row items-center">
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/Sword01.jpg" alt="Arme primaire" width="50 vw" class="mr-[1vw] border border-[#C4975E] hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] rounded
                            max-[615px]:rotate-90" id="primary-weapon">
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/Sword02.png" alt="Arme secondaire" width="30 vw" class="mr-[1vw] border border-[#C4975E] hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] rounded
                            max-[615px]:rotate-90" id="secondary-weapon">
                    <img src="<?= FULLURLROOTPATH ?>/public/assets/Helmet.jpg" alt="Armure équipée" width="30 vw" class="border border-[#C4975E] hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] rounded
                            max-[615px]:rotate-90" id="equipped-armor">
                </div>

            </div>
        </div>
    </div>
</div>
<script defer>
    function updateStatusBar() {
        fetch('<?= FULLURLROOTPATH ?>/book/statusbar')
            .then(response => response.text())
            .then(data => {
                document.getElementById('hero-data').innerHTML = data;
            });
    }
</script>