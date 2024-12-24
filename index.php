<?php

require __DIR__ . '/libs/router/Router.php';

$router = new Router();


// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});

$router->get('/',function(){
    include __DIR__ . DIRECTORY_SEPARATOR . 'views'. DIRECTORY_SEPARATOR . 'index.php';
});

$router->run();