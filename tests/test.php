<?php
require __DIR__ . '/../autoload.php';

$data = ['title'=> 'ffsdf', 'text'=>'adf'];
$news = new \App\Models\News();
$news->fill($data);
var_dump($news);













/*
$author = \App\Models\News::findOneById(1);
var_dump($author);
var_dump(empty($author->author));
*/


/*
$author = new \App\Models\Author();
$author->id = 10;
$author->author_name = 'Саф рио';
//var_dump($news);die;
$author->save();
*/


/*
$News = new \App\Models\News();
$News->author = 'Автор 55'; // ---------
$News->title = 'Тестовый заголовок 55';
$News->text = 'Тестовый текст 55';
//var_dump($News);die;
$News->save();
//var_dump($News);
*/


/*


class TestIterator implements Iterator {


    protected $data = [['1'=>'2'],['2'=>'3']];

 public function current()   //Возвращает текущий элемент массива
    {
        $var = current($this->data);
        return $var;
    }

    public function next()     // Передвигает внутренний указатель массива на одну позицию вперёд
    {
        $var = next($this->data);;
        return $var;
    }

    public function key()          //возвращает индекс текущего элемента массива
    {
        $var = key($this->data);;
        return $var;
    }

    public function valid()     // Проверяет не вышли ли мы за границу
    {
        $key = key($this->data);
        $val = ($key !== null && $key !== false);
        return $val;
    }

    public function rewind()    // Передвигает внутренний указатель в начало
    {
        reset($this->data);
    }


}
$test = new TestIterator();
foreach($test as $val){
    var_dump($val) ;
}
*/