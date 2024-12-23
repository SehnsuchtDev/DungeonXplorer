<?php include('./connection.php'); ?>
<script defer>

    document.addEventListener("DOMContentLoaded", () => {
        window.bookmanager.loadTwoPage("./booktest/StoryMode_Page1.php", "./booktest/StoryMode_Page2.php");
    });

    btnContinue = document.getElementById("connecter");
    btnContinue.removeAttribute("id");
    btnContinue.addEventListener("click", () => {
        window.bookmanager.flipNext()
    });

</script>