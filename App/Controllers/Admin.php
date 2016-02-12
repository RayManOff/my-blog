<?php

namespace App\Controllers;


use App\Classes\Controller;
use App\Models\News;

class Admin extends Controller {

    /**
     * Выводит все новости с возможеостью редактирования
     */
    protected function actionEdit(){

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
            $news = new News();

            if($news->checkData($_POST))
            {
                $news->fill($_POST);
                $news->save();
                $this->redirect('/Admin/Edit');

            } else {

                $this->view->title = 'Добавить новость';
                $this->view->display(__DIR__ . '/../Templates/News/Add.php');
            }
    }

    /**
     * Действие обновления новости по id
     */
    protected function actionUpdate()
    {

        $article = \App\Models\News::findOneById($_GET['id']);

        if($article->checkData($_POST)){

            $article->fill($_POST);
            $article->save();
            $this->redirect('/Admin/Edit');
        } else {

            $this->redirect('/Admin/Edit');
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