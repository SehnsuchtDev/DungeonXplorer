<?php

/**
 * BookController Class
 * Handles actions related to the book.
 */
class BookController
{

    /**
     * Display the book view.
     */
    public function show()
    {
        require dirname(__DIR__) . "/views/book.php";
    }

}