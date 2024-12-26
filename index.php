<?php

require __DIR__ . '/libs/router/Router.php';
require __DIR__ . '/autoload.php';

require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

define('URLROOTPATH', dirname($_SERVER['PHP_SELF']));
define('FULLURLROOTPATH', (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']));
define('FULLCURRENTURL', (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']));

require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';

$router = new Router();


// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    echo '404, route not found!';
});

$router->get('/',function(){
    include __DIR__ . DIRECTORY_SEPARATOR . 'views'. DIRECTORY_SEPARATOR . 'index.php';
});

$router->get('/chapter','ChapterController@showChapter');
$router->get('/chapter/(\d+)','ChapterController@changeChapter');
$router->get('/chapter/fight','ChapterController@fight');
$router->post('/chapter/mcqtest','ChapterController@MCQTestAnswer');

$router->get('/inventory/use/(\d+)','InventoryController@useItem');
$router->get('/inventory/equip/(\d+)/primaryweapon','InventoryController@equipPrimaryWeapon');
$router->get('/inventory/equip/(\d+)/secondaryweapon','InventoryController@equipSecondaryWeapon');
$router->get('/inventory/drop/(\d+)','InventoryController@dropItem');

$router->get("signup","SignupController@show");
$router->post("signup","SignupController@signup");


$router->get("login","LoginController@show");
$router->post("login","LoginController@login");

$router->get("hero","HeroCreationController@show");
$router->post("hero","HeroCreationController@creation");

$router->run();