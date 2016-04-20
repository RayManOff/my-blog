<?php

return [

    'db' => [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'dbname' => 'test',
        'user' => 'root',
        'password' => '',
    ],

    'mail' => [
        'method' => 'smtp',
        'host' => 'smtp.gmail.com',
        'port' => 465,
        'secure' => 'ssl',
        'auth' => [
            'username' => 'ruslan8520@gmail.com',
            'password' => ''
        ],
        'sender' => 'admin'
    ],
    
    'file' => [
       'uploads_dir' => '/home/rayman/domains/my-blog/App/trash/'
    ]
    
];