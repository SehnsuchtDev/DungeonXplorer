<!DOCTYPE html>


    <div id="chapDiv" class="pagediv bg-[#F6F0E8] h-full w-full filter drop-shadow-lg shadow-inner">

        <div class="p-6 font-['Pirata_One'] justify-items-center text-center">
        
            <?php if ($fight):?>
                <div class="bg-[#C4975E] py-1 px-6 m-3 text-2xl rounded max-w-xs mx-auto" id="choice2"
                    class="pointer-events-auto">
                    <p>Un adversaire approche...</p>
                </div>
            <?php endif;?>

            <img src="<?=constant('FULLURLROOTPATH')?>/public/assets/<?=$image?>"width=250px>

            <?php if($mcq):?>
                
                <br>
                <p class="text-2xl font-bold"><?=$mcqQuestion?></p>
                <br>
                <form id="mcqTest<?=$seed?>" class="text-left" method="post" action="<?=constant('FULLURLROOTPATH')?>/book/page/chapter/mcqtest">
                    <?php foreach ($mcqChoices as $key => $choice):?>
                        <input class="pointer-events-auto" type="radio" name="choice" value="<?=$key?>"><?=$choice?></input><br>
                    <?php endforeach;?>
                    <br>
                    <input class="pointer-events-auto" type="submit" value="Valider">
                </form>  
            <?php elseif ($fight):?>
            

                    <p class="text-2xl font-bold"><?=$monster['name']?></p>

                    <div class="flex">
                        <div class="flex m-4">
                            <img src="<?= FULLURLROOTPATH?>/public\assets\health.png" alt="player's health" width="50" height="50"
                                title="player's health" />
                            <p class="content-center">&nbsp; <?=$monster['pv']?> </p>
                        </div>
                        <div class="flex m-4">
                            <img src="<?= FULLURLROOTPATH?>/public\assets\mana.png" alt="player's mana" width="50" height="50"
                                title="player's mana" />
                            <p class="content-center">&nbsp; <?=$monster['mana']?> </p>
                        </div>
                        <div class="flex m-4">
                            <img src="<?= FULLURLROOTPATH?>/public\assets\shield.png" alt="player's shield" width="50" height="50"
                                title="player's shield" />
                            <p class="content-center">&nbsp; <?=$monster['initiative']?></p>
                        </div>
                    </div>

                    <!-- AVANT COMBAT -->
                    <div class="bg-[#C4975E] py-3 px-6 m-3 text-2xl rounded max-w-xs mx-auto pointer-events-auto cursor-pointer">
                        <a class="pageButton<?=$seed?>" href="<?=constant('FULLURLROOTPATH')?>/book/page/chapter/fight"><button <?= $eventIsDone ? 'disabled' : '' ?> ><?=$fightStatus?></button></a>
                    </div>
            <?php endif;?>
            <br>

            <?php foreach ($nextChapterId as $id):?>
            <a class="btn-next<?=$seed?>" href="<?=constant('FULLURLROOTPATH'). '/book/page/chapter/changeChapter/'.$id?>">
                <button class="z-10 pointer-events-auto" <?= $eventIsDone ? '' : 'disabled' ?>>Allez au chapitre <?=$id?></button>
            </a>
            <?php endforeach;?>

        </div>

    </div>

    <script defer>
        <?php if(isset($dead) && $dead): ?>
            alert("Vous êtes mort");
        <?php endif; ?>


    let chapterTrun<?=$seed?> = false;

    for(let e of document.querySelectorAll(".pageButton<?=$seed?>")){
        e.addEventListener("click",(event)=>{
            event.preventDefault();
            window.bookmanager.refreshDivWithGetMethod(e.href,"chapDiv");
        })
    }

    for(let a of document.querySelectorAll(".btn-next<?=$seed?>")){
        a.addEventListener("click",(event)=>{
            event.preventDefault();
            if(chapterTrun<?=$seed?>) return;
            chapterTrun<?=$seed?> = true;
            fetch(a.href).then(()=>{
                window.bookmanager.loadTwoPageAndTurn("<?=FULLURLROOTPATH?>/book/page/chapter/p1", "<?=FULLURLROOTPATH?>/book/page/chapter/p2");
            })
        })
    }

    <?php if($mcq):?>
    document.getElementById("mcqTest<?=$seed?>").addEventListener("submit",(event)=>{
        event.preventDefault();
        const formData = new FormData(event.target);
        bookmanager.refreshDivWithPostMethod(event.target.action, formData,"chapDiv");
    });
    <?php endif;?>

    </script>
