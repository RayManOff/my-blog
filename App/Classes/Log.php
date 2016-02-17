<?php

namespace App\Classes;


class Log {

    protected $massage;
    protected $file;
    protected $line;


    public function logRecord(){

        $log_file = __DIR__ . '/../log.txt';
        file_put_contents($log_file, date('l jS \of F Y h:i:s A') . "\r\n", FILE_APPEND);
        foreach($this as $key=>$value) {
            $str = $key . '--' . $value . "\r\n";
            file_put_contents($log_file, $str, FILE_APPEND);
        }
        file_put_contents($log_file, "\r\n", FILE_APPEND);

    }
    public function fill($e){

        $this->massage = $e->getMessage();
        $this->file = $e->getFile();
        $this->line = $e->getLine();
    }

}