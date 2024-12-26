<?php

require __DIR__ . '/libs/router/Router.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

define('URLROOTPATH', dirname($_SERVER['PHP_SELF']));
define('FULLURLROOTPATH', (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']));
define('FULLCURRENTURL', (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']));

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

$router->get('/', 'HomeController@show');

$router->get('logout','LogoutController@logout');

$router->get('account','AccountController@show');

$router->get('delete', 'AccountController@delete');

$router->set404(function (){
    (new ErrorController())->show();
});

$router->run();