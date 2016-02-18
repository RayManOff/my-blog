<?php

namespace App\Classes;


use App\TSingleton;

class DB {
    use TSingleton;

    protected $dbh;
    protected $class;

    protected function __construct() {

        try{
            $dsn = 'mysql:host=localhost;dbname=test';
            $this->dbh = new \PDO($dsn, 'root', '');
        } catch (\PDOException $e){
              throw new \App\Exceptions\DB('Ошибка при подключении к базе данных');
        }
    }

    public function execute($sql, $params = []){

        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    public function query($sql, $params = []){

        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $res = $sth->fetchAll(\PDO::FETCH_CLASS, $this->class);
        if(!false == $res ){
            return $res;
        } else {
            return [];
        }
    }

    public function setClass($class){

        $this->class = $class;
    }

    public function getLastInsertId(){
        return $this->dbh->lastInsertId();
    }

}



