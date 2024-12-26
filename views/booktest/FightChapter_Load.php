<div class="bg-blue-900">
    Page Cover
    <button id="cover_btn" class="btn-next z-10 pointer-events-auto">page après</button>
</div>
<script defer>

    document.addEventListener("DOMContentLoaded", () => {
        window.bookmanager.loadTwoPage("http://localhost/medieval/DungeonXplorer/views/booktest/AnyChapter_Page1.php", "http://localhost/medieval/DungeonXplorer/views/booktest/FightChapter_Page2.php");
    });

    document.getElementById("cover_btn").addEventListener("click", () => {
        window.bookmanager.flipNext();
    });
</script>