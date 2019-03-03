<?php
require __DIR__ . DIRECTORY_SEPARATOR . '..'. DIRECTORY_SEPARATOR .'vendor' . DIRECTORY_SEPARATOR .'autoload.php';

session_start();

use MotivOnline\Application;

// Run application
$app = new Application();
$app->run();
