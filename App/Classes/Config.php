<?php

namespace App\Classes;

namespace App;


class Config
{

    use TSingleton;

    public $data;

    protected function __construct()
    {

        $this->data['db'] = include __DIR__ . '/../config.php';
    }

}