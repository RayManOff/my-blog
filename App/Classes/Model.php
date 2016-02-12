<?php

namespace App\Classes;

use App\TMagic;

abstract class Model {

    const TABLE = '';

    use TMagic;

    public static function findAll(){

        $sql = 'SELECT * FROM ' . static::TABLE;
        $db = DB::instance();
        $db->setClass(static::class);
        $res = $db->query($sql);
        return $res;
    }

    public static function findOneById(int $id){

        $sql = 'SELECT * FROM '. static::TABLE . ' WHERE id=:id';
        $db = DB::instance();
        $db->setClass(static::class);
        $res = $db->query($sql, [':id'=>$id]);
        if([] == $res ){
            return false;
        } else {
            return $res[0];
        }
    }

    public static function findOneByColumn($column, $value){

        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE ' . $column .'=:value';
        $db = DB::instance();
        $db->setClass(static::class);
        $res = $db->query($sql, [':value'=>$value]);
        if([] == $res) {
            return false;
        } else {
            return $res[0];
        }
    }

    public function isNew()
    {
        return empty($this->id);
    }

    protected function insert(){

        $columns = [];
        $params = [];

        foreach($this->data as $key => $value){
            if('id' == $key){
                continue;
            }
            $columns[] = $key;
            $params[':'.$key] = $value;
        }
        //var_dump($params);die;

        $sql = 'INSERT INTO ' . static::TABLE . ' ('. implode(', ', $columns) . ')' .
           ' VALUES '. '(' .implode(', ' , array_keys($params)). ')';

        //var_dump($sql);die;

        $db = DB::instance();

        $res = $db->execute($sql, $params);
        $this->data['id'] = $db->getLastInsertId();
        return $res;
    }

    protected function update() {

        $columns = [];
        $params = [];

        foreach($this->data as $key => $value){

            $params[':'.$key] = $value;

            if('id' == $key){
                continue;
            }
            $columns[] = $key . '=:'. $key;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET '  . implode(', ', $columns) . ' WHERE id=:id';
        //var_dump($params);die;

        $db = DB::instance();
        return $db->execute($sql, $params);
    }

    public function save(){
        if($this->isNew()){
            return $this->insert();
        } else {
            return $this->update();
        }
    }

    public function delete() {

        $params = [];
        foreach($this->data as $key => $value){
            if($key != 'id') {
                continue;
            }
            $params[':'.$key] = $value;
        }
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        //var_dump($params);die;

        $db = DB::instance();
        $db->execute($sql, $params);
    }

}