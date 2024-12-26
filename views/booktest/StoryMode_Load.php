<?php 

    require dirname(__DIR__ ,2) . DIRECTORY_SEPARATOR . "autoload.php";

    (new LoginController())->show();


//include(dirname(__DIR__) .DIRECTORY_SEPARATOR.'connection.php'); ?>
<script defer>  

    document.addEventListener("DOMContentLoaded", () => {
        window.bookmanager.loadTwoPage("<?= FULLURLROOTPATH?>/book/page/hero/p1", "<?= FULLURLROOTPATH?>/book/page/hero/p2");
    });



</script>