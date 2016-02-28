<?php

namespace App\Classes;

use App\Mail\Sender;

class Logger
{

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

    public function logRecord()
    {

        $res = fopen(self::PATH, 'a+');
        fwrite($res, date('l jS \of F Y h:i:s A') . "\r\n");
        foreach ($this as $k => $v) {
            $str = $k . ' : ' . $v . "\r\n";
            fwrite($res, $str);
        }
        fwrite($res, "\r\n");
        fclose($res);

    }

    public function sendMail()
    {
        $message = [];
        $message['subject'] = 'error';
        $message['body'] = $this->massage . ' '. $this->file . ' line:' . $this->line;
        $recipient = 'ruslan8520@gmail.com';

        Sender::send($message, $recipient);

    }


}