<?php

namespace App\Classes;


use App\Exceptions\Exception404;

abstract class Controller {

    protected $view;

    public function __construct() {

        $this->view = new View();
    }

    /**
     * TODO доделай метод с исключениями
     *
     */

    public function action($action) {

        $methodName = 'action' . $action;
        if(!method_exists($this, $methodName)){
            throw  new Exception404('Страница не найдена', 404);
        }
        return $this->$methodName();

    }

    public function redirect($url)
    {
        header('location: ' . $url);
        exit;
    }

    public function isPost(){

        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public function isGet(){

        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

}