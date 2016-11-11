<?php

header('Content-Type: text/plain;');
error_reporting(E_ALL ^ E_WARNING);
set_time_limit(0);
ob_implicit_flush();

echo "-= Server =-\n\n";
$address = 'localhost';
$port = 10001;

try {
    echo 'Create socket ... ';

    // socket_create - создает сокет
    // socket_create returns a socket resource on success, or FALSE on error

    if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) == false) {
        throw new Exception('socket_create() failed: '.socket_strerror(socket_last_error())."\n");
    } else {
        echo "OK\n";
    }

    echo 'Bind socket ... ';

    // socket_bind (resource $socket , string $address [, int $port = 0 ] )
    // Привязывает имя, указанное в параметре address, к сокету, описанному в параметре socket.
    // Возвращает TRUE в случае успешного завершения или FALSE в случае возникновения ошибки

    if (($ret = socket_bind($sock, $address, $port)) == false) {
        throw new Exception('socket_bind() failed: '.socket_strerror(socket_last_error())."\n");
    } else {
        echo "OK\n";
    }

    echo 'Listen socket ... ';

    // socket_listen - Прослушивет определенный сокет.
    // Возвращает TRUE в случае успешного завершения или FALSE в случае возникновения ошибки.

    if (($ret = socket_listen($sock, 5)) == false) {
        throw new Exception('socket_listen() failed: '.socket_strerror(socket_last_error())."\n");
    } else {
        echo "OK\n";
    }

    do {
        echo 'Accept socket ... ';

        // socket_accept — Принимает соединение на сокете
        // В случае успеха возвращает новый ресурс сокета или FALSE в случае ошибки.

        if (($msgsock = socket_accept($sock)) == false) {
            throw new Exception('socket_accept() failed: '.socket_strerror(socket_last_error())."\n");
        } else {
            echo "OK\n";
        }
        $msg = "Hello, Client!";

        echo "Say to client ($msg) ... ";

        // socket_write — Запись в сокет
        // int socket_write ( resource $socket , string $buffer [, int $length ] )
        // Возвращает количество байт, успешно записанных в сокет или FALSE в случае возникновения ошибки.

        socket_write($msgsock, $msg, strlen($msg));

        echo "OK\n";

        do {
//            echo 'Client said: ';
//
//            // socket_read — Читает строку байт максимальной длины length из сокета
//            // string socket_read ( resource $socket , int $length [, int $type = PHP_BINARY_READ ] )
//            // socket_read() возвращает данные в виде строки в случае успеха, или FALSE в случае ошибки
//
            if (false === ($buf = socket_read($msgsock, 1024))) {
                throw new Exception('socket_read() failed: '.socket_strerror(socket_last_error())."\n");
            } else {
                echo $buf."\n"; die;
            }
//
//            if (!$buf = trim($buf)) {
//                continue;
//            }
//            if ($buf == 'shutdown') {
//                socket_close($msgsock);
//                break 2;
//            }
//            echo "Say to client ($buf) ... ";
//
//            socket_write($msgsock, $buf, strlen($buf));
//            echo "OK\n";
//
        } while (true);

    } while (true);

} catch (Exception $e) {
    echo "\nError: ".$e->getMessage();
}

if (isset($sock)) {
    echo 'Close socket ... ';
    socket_close($sock);
    echo "OK\n";
}

