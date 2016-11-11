<?php

return [

    'db' => [
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'dbname' => 'test',
        'user' => 'postgres',
        'password' => 'postgres',
    ],

//    'mysql' => [
//        'driver' => 'mysql',
//        'host' => '127.0.0.1',
//        'dbname' => 'test',
//        'user' => 'root',
//        'password' => '8520',
//    ],

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