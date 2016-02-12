<?php
/**
 * Created by PhpStorm.
 * User: Gadel
 * Date: 09.02.2016
 * Time: 11:47
 */

namespace App;



trait TIterator {

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