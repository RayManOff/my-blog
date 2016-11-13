<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Console/TestCommand.php';
require __DIR__ . '/Console/DefaultCommand.php';

use Symfony\Component\Console\Application;

$default = new \Console\DefaultCommand();

$app = new Application();

$app->add(new \Console\TestCommand());
$app->add($default);
$app->setDefaultCommand($default->getName());
$app->run();