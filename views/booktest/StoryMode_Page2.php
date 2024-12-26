<!DOCTYPE html>

    <div class="bg-[#F6F0E8] h-full w-full filter drop-shadow-lg shadow-inner">

        <div class="p-10 font-['Pirata_One']">
            <div class="flex">
                <img src="<?= FULLURLROOTPATH?>/public\assets\Wizard.jpg" alt="profile picture" width="100" height="100" title="profile picture" class="rounded" />
                <p class="text-black font-bold text-3xl m-3 ml-6 place-content-center"><?= $heroName?></p>
            </div>
            
            <div class="text-justify">
                <p class="text-black font-bold text-3xl m-3 mt-10">Biographie</p>
                <p class="font-['Roboto'] text-lg"><?=$heroDescription?></p>
            </div>

            <div class="flex">
                <p class=" text-black font-bold text-3xl m-3">Classe : &nbsp;</p>
                <p class="font-['Roboto'] place-content-center text-2xl"><?=$heroClasse?></p>
            </div>

        </div>

    </div>