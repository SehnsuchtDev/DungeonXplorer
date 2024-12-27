<div class="w-[100%] flex flex-col items-center justify-center font-['Pirata_One'] text-[#ADADAD] text-[5vh]"
    id="hero-data">
    <div class="w-[800px] flex flex-row">
        <div class="flex flex-row justify-between w-[60%]">
            <div class="flex flex-row items-center">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/health_icon.svg" alt="Icône vie" width="50 vw">
                <p class="ml-2">18/20</p>
            </div>
            <div class="flex flex-row items-center">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/energy_icon.svg" alt="Icône énergie" width="50 vw">
                <p class="ml-2">10</p>
            </div>
            <div class="flex flex-row items-center">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/initiative_icon.png" alt="Icône défense" width="50 vw">
                <p class="ml-2">5</p>
            </div>
            <div class="flex flex-col items-center">
                <p class="text-[2.5vh]">Niveau 1</p>
                <p class="text-[2.5vh]">Xp: 100/250</p>
            </div>


        </div>


        <div class="ml-10 w-[40%] flex flex-row-reverse justify-evenly">
            <button id="inventory-button" href="<?= FULLURLROOTPATH ?>/book/inventory" class="cursor-pointer">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/hero_data_icons/inventory_icon.svg" alt="Inventory icon" width="50 vw">
            </button>
            <div class="flex flex-row items-center">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/Sword01.jpg" alt="Arme primaire" width="50 vw"
                    class="mr-[1vw] border border-[#C4975E] hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] rounded"
                    id="primary-weapon">
                <img src="<?= FULLURLROOTPATH ?>/public/assets/Sword02.png" alt="Arme secondaire" width="30 vw"
                    class="border border-[#C4975E] hover:cursor-pointer hover:drop-shadow-sm hover:border-[#8B1E1E] rounded"
                    id="secondary-weapon">
            </div>

        </div>
    </div>
</div>