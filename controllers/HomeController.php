<?php

/**
 * HomeController Class
 * Handles the display of the home page.
 */
class HomeController
{

    /**
     * Displays the home page.
     */
    public function show()
    {
        require dirname(__DIR__) . "/views/index.php";
    }

}