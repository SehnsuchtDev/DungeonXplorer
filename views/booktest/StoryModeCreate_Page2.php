<!DOCTYPE html>

    <div id="creationHero" class="bg-[#F6F0E8] h-full w-full filter drop-shadow-lg shadow-inner">
    <form id="formulaireCreateHero" method="post" action="<?= FULLURLROOTPATH ?>/book/page/hero " >
        <div class="p-10 font-['Pirata_One']">
            <div class="flex">
                <img src="<?= FULLURLROOTPATH ?>/public\assets\Wizard.jpg" alt="profile picture" width="100" height="100"
                    title="profile picture" class="rounded" />
                <input type="text" value="Nom" name="name" id="name" alt="character's name"
                    class="pointer-events-auto text-black font-bold text-3xl ml-6 p-1 place-content-center max-h-12 max-w-48">
            </div>

            <div class="text-justify">
                <p class="text-black font-bold text-3xl m-3 mt-10">Biographie</p>
                <textarea id="biography" name="biography" alt="character's name" rows="8" cols="33"
                    class="pointer-events-auto text-black font-['Roboto'] text-lg font-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipiscialias soluta magni. Molestiae voluptate, voluptates dicta dignissimos facere reiciendis error illumcommodi laudantium numquam, dolorem quam fugit perferendis. Natus, sit!
                </textarea>

            </div>

            <div class="flex">
                <p class="text-black font-bold text-3xl m-3">Classe : &nbsp;</p>
                <select id="class" name="class" class="pointer-events-auto font-['Roboto'] place-self-center max-h-6">
                    <option value="2">Sorcier</option>
                    <option value="3">Voleur</option>
                    <option value="1">Guerrier</option>
                </select>
            </div>

            <input type="submit" value="Enregistrer" class="bg-[#C4975E] p-3 text-2xl border-solid border-2 border-black rounded max-w-xs mx-auto pointer-events-auto cursor-pointer">

        </div>
    </form>

    </div>

    

    <script defer> 

            <?php if(isset($errors) && empty($errors)): ?>
                <?php elseif(isset($errors)): ?>
                    let str = "";
                    <?php foreach($errors as $e): ?>
                        str += "<?=$e?>\n";
                    <?php endforeach ?>
                    alert(str);
            <?php endif; ?>

        document.getElementById("formulaireCreateHero").addEventListener("submit",(event)=>{
        event.preventDefault();
        const formData = new FormData(event.target);
        bookmanager.refreshDivWithPostMethod(event.target.action, formData,"creationHero");
    });
    </script>

