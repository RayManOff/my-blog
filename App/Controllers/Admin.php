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
        $this->view->display(__DIR__ . '/../Templates/News/Edit.php');
    }
    /**
     * Действие для добовления новости
     *
     */
    protected function actionAdd ()
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

         $this->view->display(__DIR__ . '/../Templates/News/Add.php');


    }

    /**
     * Действие обновления новости по id
     */
    protected function actionUpdate()
    {
        if($this->isPost()){
            try {
                $article = \App\Models\News::findOneById($_GET['id']);
                $article->checkData($_POST);
                $article->fill($_POST);
                $article->save();
                $this->redirect('/Admin/Edit');
            } catch (MultiException $error) {

            }
        }


    }

    /**
     * Действие по удалению новости по id
     */
    protected function actionDelete (){

        $article= \App\Models\News::findOneById($_GET['id']);
        $article->delete();
        $this->redirect('/Admin/Edit');
    }

}