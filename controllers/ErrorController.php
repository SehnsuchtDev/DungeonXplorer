<?php

/**
 * ErrorController Class
 * Handles the display of error pages for the application.
 */
class ErrorController
{

    /**
     * Displays the 404 error page.
     */
    public function show()
    {
        require dirname(__DIR__) . "/views/error404.php";
    }

    /**
     * Displays the 403 error page.
     */
    public function show403()
    {
        require dirname(__DIR__) . "/views/error403.php";
    }

}