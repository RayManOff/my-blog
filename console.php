<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Console/TestCommand.php';

use Symfony\Component\Console\Application;

$app = new Application();

$app->add(new \Console\TestCommand());

$app->run();