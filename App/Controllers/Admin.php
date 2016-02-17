<?php

namespace App\Controllers;

use App\Classes\Controller;
use App\Classes\MultiException;
use App\Models\News;

class Admin extends Controller {

    /**
     * Выводит все новости с возможеостью редактирования
     */
    protected function actionIndex(){

        $this->view->title = 'Админка';
        $this->view->news = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../Templates/News/Admin.php');
    }

    /**
     * Действие для добовления новости
     *
     */
    protected function actionCreate ()
    {
        if ($this->isPost()) {
            try {
                 $news = new News();
                 $news->fill($_POST);
                 $news->save();
                 $this->redirect('/Admin');
             } catch (MultiException $error) {
                 $this->view->errors = $error;
             }
         } else {
             $this->view->errors = null;
         }
         $this->view->display(__DIR__ . '/../Templates/News/Create.php');
    }

    /**
     * Действие обновления новости по id
     */
    protected function actionUpdate()
    {
        if($this->isPost()){
            try {
                $news = \App\Models\News::findOneById($_GET['id']);
                $news->fill($_POST);
                $news->save();
                $this->redirect('/Admin/Index');
            } catch (MultiException $error) {
                $this->view->errors = $error;
            }
        } else {
            $this->view->news = \App\Models\News::findOneById($_GET['id']);
            $this->view->errors = null;
        }
        $this->view->display(__DIR__ . '/../Templates/News/Update.php');

    }

    /**
     * Действие по удалению новости по id
     */
    protected function actionDelete (){

        $news = \App\Models\News::findOneById($_GET['id']);
        $news->delete();
        $this->redirect('/Admin');
        exit;
    }

}