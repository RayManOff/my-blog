<?php

namespace App\Classes;


trait TCollection
{

    protected $data = [];

    public function innerSet($k, $v)
    {
        $setMethod = 'set' . ucfirst($k);

        if (method_exists($this, $setMethod)) {
            $this->$setMethod($v);
            return;
        }

       $validateMethod = 'validate' . ucfirst($k);
        if (method_exists($this, $validateMethod)) {
            $validateResult = $this->$validateMethod($v);
            if($validateResult){
                $this->data[$k] = $v;
                return;
            }
        }
        $this->data[$k] = $v;
    }

    public function innerGet($k)
    {
        $getMethod = 'get' . ucfirst($k);
        if (method_exists($this, $getMethod)) {
            return $this->$getMethod($k = '');
        }
        return $this->data[$k];
    }

    public function innerIsset($k){
        $issetMethod = 'isset' . ucfirst($k);
        if(method_exists($this, $issetMethod)){
            return $this->$issetMethod($k);
        }
        return isset($this->data[$k]);
    }

    public function isEmpty()
    {
        return empty($this->data);
    }

    public function __set($k, $v)
    {
        $this->innerSet($k, $v);
    }

    public function __get($k)
    {
        return $this->innerGet($k);
    }

    public function __isset($k)
    {
        return $this->innerIsset($k);
        //return empty($this->data[$k]);
    }

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->data[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->innerGet($offset);
    }

    public function offsetSet($offset, $value)
    {
        if ('' == $offset) {
            $this->data[] = $value;
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
        return null !== key($this->data);
    }

    public function rewind()
    {
        reset($this->data);
    }

}