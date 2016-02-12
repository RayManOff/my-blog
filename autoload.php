<?php

function __autoload($class) {

    //var_dump($class);die;

    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

}