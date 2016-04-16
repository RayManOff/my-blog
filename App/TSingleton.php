<?php

namespace App;

trait TSingleton
{

    static $instance;

    protected function __construct()
    {

    }

    public static function instance()
    {

        if (empty(static::$instance)) {

            return static::$instance = new static;

        } else {
            return static::$instance;
        }
    }

}