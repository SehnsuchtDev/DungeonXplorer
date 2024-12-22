<?php 
// autoload.php
spl_autoload_register(function ($class) {
    
    if(str_contains($class,'dungeonxplorer')){
        $class = str_replace('dungeonxplorer\\','',$class);
        $class = str_replace('\\',DIRECTORY_SEPARATOR,$class);
        require 'models' . DIRECTORY_SEPARATOR . $class . '.php';
        return;
    }

    $directories = array(
        'controllers/'
    );

    foreach ($directories as $directory) {
        $filePath = $directory . $class . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
});

require_once __DIR__ . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'Dbconnection.php';