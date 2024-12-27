<?php

require_once __DIR__ . '/../autoload.php';

class LogoutController
{

    /**
     * Handles the logout functionality.
     */
    public function logout()
    {
        session_start();
        session_destroy();
        header("location:" . FULLURLROOTPATH);
    }

}