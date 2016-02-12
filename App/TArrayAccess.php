<?php
/**
 * Created by PhpStorm.
 * User: Gadel
 * Date: 08.02.2016
 * Time: 12:55
 */

namespace App;


trait TArrayAccess {

    public function offsetSet($k, $v) {

        if (is_null($k)) {
            $this->data[] = $k;
        } else {
            $this->data[$k] = $v;
        }
    }
    public function offsetGet($k)
    {
        return isset($this->data[$k]) ? $this->data[$k] : null;
    }


    public function offsetUnset($k)
    {
        unset($this->data[$k]);
    }


    public function offsetExists($k)
    {
        return isset($this->data[$k]);
    }

}