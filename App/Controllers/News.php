<?php


namespace App\Controllers;

use App\Classes\Controller;

class News extends Controller {


    /**
     * Действие для вывода всех новостей
     */
    protected function actionIndex(){

        $this->view->title = 'Новости';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../Templates/News/All.php');
    }

    /**
     * Действие для вывода одной новости по id
     */

    protected function actionOne(){

        $id = (int)$_GET['id'];
        $this->view->title = 'Новости';
        $this->view->article= \App\Models\News::findOneById($id);
        $this->view->display(__DIR__ . '/../Templates/News/One.php');
    }

}