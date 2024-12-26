<?php include(dirname(__DIR__) .DIRECTORY_SEPARATOR.'connection.php'); ?>
<script defer>  

    document.addEventListener("DOMContentLoaded", () => {
        window.bookmanager.loadTwoPage("./booktest/StoryMode_Page1.php", "./booktest/StoryMode_Page2.php");
    });



</script>