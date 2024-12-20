<div class="bg-amber-800 h-full w-full">
    <p>page 4</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci alias soluta magni. Molestiae voluptate, voluptates dicta dignissimos facere reiciendis error illum commodi laudantium numquam, dolorem quam fugit perferendis. Natus, sit!</p>
    <button id="ch2_next" class="pointer-events-auto">Page suivante</button>
</div>
<script>
    btn = document.getElementById("ch2_next");
    btn.removeAttribute("id");
    btn.addEventListener("click",() => {
        window.bookmanager.loadTwoPageAndTurn("http://localhost/medieval/DungeonXplorer/views/booktest/test_chapter1-p1.php","http://localhost/medieval/DungeonXplorer/views/booktest/test_chapter1-p2.php");
    });
</script>