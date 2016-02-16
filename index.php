<?php

require __DIR__ . '/autoload.php';

use App\Controllers;

$url = $_SERVER['REQUEST_URI'];
$path = explode('/', parse_url($url, PHP_URL_PATH));

$ctr = (!empty($path[1])) ? ucfirst($path[1]) : 'News';
$act = (!empty($path[2])) ? ucfirst($path[2]) : 'Index';

$controllerName = '\App\\Controllers\\' . $ctr;
try{
    $controller = new $controllerName;
    $controller->action($act);
} catch (\App\Exceptions\DB $e) {
     echo $e->getMessage();
}

