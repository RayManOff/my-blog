<?php

namespace App\Mail;


class Sender
{

    public $message;
    public $recipient;

    protected $mailer;

    protected $transport = 'smtp.gmail.com';
    protected $port = 465;
    protected $encryption = 'ssl';
    protected $username = 'my.mail@gmail.com';
    protected $password = '*******';


    protected function __construct ()
    {
        $transport = \Swift_SmtpTransport::newInstance($this->transport, $this->port, $this->encryption)
            ->setUsername($this->username)
            ->setPassword($this->password);
        $this->mailer = \Swift_Mailer::newInstance($transport);
        $this->message = \Swift_Message::newInstance();
    }

    public static function send(array $message = [], $recipient)
    {
        $sender = new self();
        $sender->message->setFrom($sender->username);
        $sender->message->setTo($recipient);
        $sender->message->setSubject($message['subject']);
        $sender->message->setBody($message['body']);
        $sender->mailer->send($sender->message);
    }
}

/*
$transport = \Swift_SmtpTransport::newInstance('Smtp.gmail.com', 465, 'ssl')
    ->setUsername("ruslan8520@gmail.com")
    ->setPassword("***");
//var_dump($transport);die;

$mailer = Swift_Mailer::newInstance($transport);
$message = Swift_Message::newInstance()
    ->setFrom('ruslan8520@gmail.com')
    ->setTo('ruslan8520@gmail.com')
    ->setBody("<h1>Welcome</h1>", 'text/html');
$mailer->send($message);
*/