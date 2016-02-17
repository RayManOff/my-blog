<?php
/**
 * Created by PhpStorm.
 * User: Gadel
 * Date: 12.02.2016
 * Time: 8:04
 */

namespace App\Classes;


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
        if(method_exists($this, $methodName)){
            return $this->$methodName();
        }

    }

    public function redirect($url)
    {
        header('location: ' . $url);
    }

    public function isPost(){

        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public function isGet(){

        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

}