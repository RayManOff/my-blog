<?php
$data = ['hello' => 'Привет'];
$context = stream_context_create([
    'http' => [
        'header'=> "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'GET',
        'content' => http_build_query($data),
    ]
]);

$url = 'http://my-project.loc/';

$response = file_get_contents($url, false, $context);
var_dump($response);