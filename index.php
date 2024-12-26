<?php

require __DIR__ . '/libs/router/Router.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

define('URLROOTPATH', dirname($_SERVER['PHP_SELF']));
define('FULLURLROOTPATH', (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']));
define('FULLCURRENTURL', (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']));

$router = new Router();

$router->get("book/page/signup","SignupController@show");
$router->post("book/page/signup","SignupController@signup");

$router->get("book/page/login","LoginController@show");
$router->post("book/page/login","LoginController@login");

$router->get('/', 'HomeController@show');

$router->get('logout','LogoutController@logout');

$router->get('account','AccountController@show');

$router->get('account/delete', 'AccountController@delete');

$router->get('account/modify', 'AccountController@showModify');

$router->post('account/modify/validation', 'AccountController@modify');

$router->get('book','BookController@show');

$router->get('error403', 'ErrorController@show403');

$router->set404(function (){
    (new ErrorController())->show();
});

$router->run();