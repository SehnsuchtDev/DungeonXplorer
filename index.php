<?php

require __DIR__ . '/libs/router/Router.php';
require __DIR__ . '/autoload.php';

$router = new Router();


// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});

$router->get("signup","SignupController@show");
$router->post("signup","SignupController@signup");


$router->get("login","LoginController@show");
$router->post("login","LoginController@login");

$router->get("hero","HeroCreationController@show");
$router->post("hero","HeroCreationController@creation");

$router->run();
