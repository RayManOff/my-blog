<?php
require __DIR__ . '/../autoload.php';

$act = new \App\Controllers\Admin();
$act->action('index');
