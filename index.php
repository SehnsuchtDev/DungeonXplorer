<?php

require __DIR__ . '/libs/router/Router.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'autoload.php';
session_start();

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

$router->get('/chapter','ChapterController2@showChapter');
$router->get('/book/page/chapter/p1','ChapterController@showChapterP1');
$router->get('/book/page/chapter/p2','ChapterController@showChapterP2');

$router->get('/book/page/death/p1','ChapterController@showDeathP1');
$router->get('/book/page/death/p2','ChapterController@showDeathP2');

$router->get('book/page/chapter/changeChapter/(\d+)','ChapterController@changeChapter');
//$router->get('/chapter/fight','ChapterController@fight');
$router->get('/book/page/chapter/fight','ChapterController@fight');
//$router->post('/chapter/mcqtest','ChapterController@MCQTestAnswer');
$router->post('book/page/chapter/mcqtest','ChapterController@MCQTestAnswer');

$router->get('book/statusbar','StatusBarController@show');

$router->get("book/inventory", "InventoryController@show");
$router->get("book/inventory/details/(\d+)", "InventoryController@showInventroyDetails");
$router->get("book/item/details/(\d+)", "InventoryController@showItemDetails");


$router->get('/inventory/use/(\d+)','InventoryController@useItem');
$router->get('/inventory/equip/(\d+)/primaryweapon','InventoryController@equipPrimaryWeapon');
$router->get('/inventory/equip/(\d+)/secondaryweapon','InventoryController@equipSecondaryWeapon');
$router->get('/inventory/equip/(\d+)/armor','InventoryController@equipArmor');
$router->get('/inventory/drop/(\d+)','InventoryController@dropItem');


$router->get('account/delete', 'AccountController@delete');

$router->get('account/modify', 'AccountController@showModify');

$router->post('account/modify/validation', 'AccountController@modify');

$router->get('book','BookController@show');

$router->get('error403', 'ErrorController@show403');

$router->set404(function (){
    (new ErrorController())->show();
});

$router->get("book/page/hero/p1","HeroCreationController@showp1");
$router->post("book/page/hero","HeroCreationController@creation");
$router->get("book/page/hero/p2","HeroCreationController@showp2");


$router->get('account/delete/hero',"AccountController@deleteHero");

$router->run();

