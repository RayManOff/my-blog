<?php

namespace App\Classes;


class Logger {

    const PATH = __DIR__ . '/../log.txt';
    protected $massage;
    protected $file;
    protected $line;


    public function __construct($error)
    {
        $this->massage = $error->getMessage();
        $this->file = $error->getFile();
        $this->line = $error->getLine();
    }

    public function logRecord(){

        file_put_contents(self::PATH, date('l jS \of F Y h:i:s A') . "\r\n", FILE_APPEND);
        foreach($this as $key=>$value) {
            $str = $key . '--' . $value . "\r\n";
            file_put_contents(self::PATH, $str, FILE_APPEND);
        }
        file_put_contents(self::PATH, "\r\n", FILE_APPEND);
    }
}