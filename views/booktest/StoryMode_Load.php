<?php
    require dirname(__DIR__ ,2) . DIRECTORY_SEPARATOR . "autoload.php";
    (new LoginController())->show();
