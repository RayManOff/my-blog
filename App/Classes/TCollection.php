<?php
/**
 * Created by PhpStorm.
 * User: Gadel
 * Date: 15.02.2016
 * Time: 22:37
 */

namespace App\Classes;


trait TCollection
{

    protected $data = [];

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if('' == $offset){
            $this->data[] =$value;
        } else {
            $this->data[$offset] = $value;
        }

    }

    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }


    public function current()
    {
        return current($this->data);
    }


    public function next()
    {
        return next($this->data);
    }


    public function key()
    {
        return key($this->data);
    }


    public function valid()
    {
        return  null !== key($this->data) ;
    }


    public function rewind()
    {
        reset($this->data);
    }

}