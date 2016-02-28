<?php

function my_autoload($class)
{
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        include $path;
    }
}
spl_autoload_register('my_autoload');
include __DIR__ . '/vendor/autoload.php';