<tr class="border border-[#C4975E]">
    <td>
    <div class="flex">
            
           <img src="../public/assets/Village01.jpg" alt="image chapitre" />
        </div>

    </td>
    <td class="p-10">
        <div class="flex">
            <p> Numéro du chapitre: &nbsp;</p>
            <input type="text" value="Chapitre 6" class="max-h-6 rounded bg-[#2e2e2e]">
        </div>
        <div class="flex">
            <p> Nom du chapitre : &nbsp;</p>
            <input type="text" value="Le loup noir" class="max-h-6 rounded bg-[#2e2e2e]">
        </div>
        <div class="flex">
            <p>Contenu du chapitre: &nbsp;</p>
            <input type="text" value="À mesure que vous avancez, un bruissement attire votre attention. Une silhouette sombre
                s’élance soudainement devant vous : un loup noir aux yeux perçants. Son poil est hérissé
                et sa gueule laisse entrevoir des crocs acérés. Vous sentez son regard fixé sur vous, prêt
                à bondir." class="max-h-6 rounded bg-[#2e2e2e]">
        </div>

    
            
     
        <div class="relative">
    <div class="bg-white rounded px-4 py-2 flex justify-between items-center text-black">
        <span id="chapter">Sélectionnez un chapitre</span>
        <button onclick="chapterSelection()"> &darr;</button>
    </div>

    <ul class="bg-white rounded" id="pulldownmenu">
        <li onclick="selectChapter(this)" class="text-black"> Chapitre 7 </li>
        <li onclick="selectChapter(this)" class="text-black"> Chapitre 10 </li>
    </ul>
</div>

  
            


 

    <td class="p-7 text-right text-lg flex-col">
        <button class="bg-[#C4975E] text-white w-24 h-10 rounded hover:bg-[#C49700] my-1.5"> Modifier</button>
        <button class="bg-[#C4975E] text-white w-24 h-10 rounded hover:bg-[#C49700] ml-2 my-1.5">Supprimer</button>
    </td>


        
</tr>