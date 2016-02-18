<?php


namespace App\Controllers;

use App\Classes\Controller;
use App\Exceptions\Exception404;

class News extends Controller {


    /**
     * Действие для вывода всех новостей
     */
    protected function actionIndex(){

        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../Templates/News/All.php');
    }

    /**
     * Действие для вывода одной новости по id
     */

    protected function actionOne(){

       if(false == $this->view->article = \App\Models\News::findOneById($_GET['id'])) {
           throw new Exception404('Новсть не найдена. Ошибка 404');
        }
        $this->view->display(__DIR__ . '/../Templates/News/One.php');
    }

}