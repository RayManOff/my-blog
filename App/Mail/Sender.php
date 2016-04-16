<?php

namespace App\Mail;


class Sender
    extends \PHPMailer
{
    protected function getConfig()
    {
        $config = include __DIR__ . '/../config.php';
        return $config['mail'];
    }

    public function __construct($exceptions = false)
    {
        parent::__construct($exceptions);
        $config = $this->getConfig();
        $this->CharSet = 'utf-8';
        if ('smtp' == $config['method']) {
            $this->isSMTP();
            $this->Host = $config['host'];
            if (!empty($config['auth'])) {
                $this->SMTPAuth = true;
                $this->Username = $config['auth']['username'];
                $this->Password = $config['auth']['password'];
                $this->setFrom($config['auth']['username'], $config['sender']);
                $this->addReplyTo($config['auth']['username'], $config['sender']);
            }
            $this->Port = $config['port'];
            $this->SMTPSecure = !empty($config['secure']) ? $config['secure'] : '';
        }
    }

    public function sendMail($email, $theme, $message)
    {
        if (is_array($email)) {
            $this->email = $email[0];
            $this->addAddress($email[0], $email[1]);
        } else {
            $this->email = $email;
            $this->addAddress($email, 'recipient');
        }

        $this->theme = $theme;
        $this->Subject = $theme;
        $this->answer = $message;
        $this->msgHTML($message);
        return $this->send();
    }

}