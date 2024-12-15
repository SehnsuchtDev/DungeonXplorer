<div class="bg-blue-900">
    Page Cover
    <button id="cover_btn" class="btn-next z-10 pointer-events-auto">page après</button>
</div>
<script defer>

    document.addEventListener("DOMContentLoaded",() => {
        window.bookmanager.loadTwoPage("http://localhost/DungeonXplorer/views/booktest/test_chapter1-p1.php","http://localhost/DungeonXplorer/views/booktest/test_chapter1-p2.php");
    });
    
    document.getElementById("cover_btn").addEventListener("click",() => {
        window.bookmanager.flipNext();
    });
</script>