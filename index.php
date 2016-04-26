<?php

require __DIR__ . '/autoload.php';

use App\Controllers;

$url = $_SERVER['REQUEST_URI'];
$path = explode('/', parse_url($url, PHP_URL_PATH));

$ctr = (!empty($path[1])) ? ucfirst($path[1]) : 'News';
$act = (!empty($path[2])) ? ucfirst($path[2]) : 'Index';

$controllerName = '\App\\Controllers\\' . $ctr;

try {

    $controller = new $controllerName;
    $controller->action($act);

} catch (\App\Exceptions\DB $e) {

    $log = new \App\Classes\Logger($e);
    $log->logRecord();
    $view = new \App\Classes\View();
    $view->error = $e->getMessage();
    $view->display(__DIR__ . '/App/Templates/Error.php');

} catch (\App\Exceptions\Exception404 $e) {

    $log = new \App\Classes\Logger($e);
    $log->logRecord();
    $view = new \App\Classes\View();
    $view->error = $e->getMessage();
    $view->display(__DIR__ . '/App/Templates/Error.php');
}















