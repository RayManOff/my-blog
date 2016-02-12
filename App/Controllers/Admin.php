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
     * Если пришло из формы $_POST (title, text, author) то добавляем и к действию Edit
     * Не пришло выводим форму добавления
     */
    protected function actionAdd () {

        if((!empty($_POST['title'])) && (!empty($_POST['text'])) && (!empty($_POST['author']))) {

            $news = new News();
            $news->title = $_POST['title'];
            $news->text = $_POST['text'];
            $news->author = $_POST['author'];
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
    protected function actionUpdate(){

        if((!empty($_POST['title'])) && (!empty($_POST['text'])) && (!empty($_POST['author']))) {

            $id = (int)$_GET['id'];
            $article = \App\Models\News::findOneById($id);
            $article->title = $_POST['title'];
            $article->text = $_POST['text'];
            $article->author = $_POST['author'];
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

        $id = (int)$_GET['id'];
        $article= \App\Models\News::findOneById($id);
        $article->delete();
        $this->redirect('/Admin/Edit');
    }

}