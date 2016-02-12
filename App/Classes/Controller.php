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

    public function action($action) {
        $methodName = 'action' . $action;
        //$this->beforeAction();
        return $this->$methodName();
    }

    public function redirect($url)
    {
        header("location: " . $url);
        exit;
    }

}