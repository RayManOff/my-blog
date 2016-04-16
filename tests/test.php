<?php
require __DIR__ . '/../autoload.php';

$mail = new \App\Mail\Sender();
$mail->sendMail('ruslan8520@gmail.com', 'test', 'Hello');