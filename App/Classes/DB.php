<?php

namespace App\Classes;

use App\TSingleton;

class DB
{
    use TSingleton;

    protected $dbh;
    protected $class;
    
    
    public function getConfig()
    {
        $config = include __DIR__ .'/../config.php';
        return $config['db'];
    }

    protected function __construct()
    {
        $config = $this->getConfig();
        $dsn = "{$config['driver']}:host={$config['host']};dbname={$config['dbname']}";
        
        try {
            $this->dbh = new \PDO($dsn, $config['user'], $config['password']);
        } catch (\PDOException $e) {
            throw new \App\Exceptions\DB('Ошибка при подключении к базе данных');
        }
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);

        return $sth->execute($params);
//        $sth->execute($params);
//        var_dump($sth->errorInfo());die;
    }

    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $res = $sth->fetchAll(\PDO::FETCH_CLASS, $this->class);
        if (!false == $res) {
            return $res;
        } else {
            return [];
        }
    }
    
    public function setClass($class)
    {
        $this->class = $class;
    }

    public function getLastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}



