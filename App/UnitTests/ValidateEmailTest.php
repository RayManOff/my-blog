<?php

class ValidateEmailTest
    extends PHPUnit_Framework_TestCase
{
    public function testValidateEmail()
    {
        $send = new \App\Mail\Sender();
        $reflerctor = new ReflectionMethod($send, 'validateEmail');
    }
}