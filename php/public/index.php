<?php
define('ROOT', substr(__DIR__, 0, strrpos( __DIR__, '/')));
define('APPROOT', ROOT . '/src');
require ROOT . '/vendor/autoload.php';
session_start();

use App\App;
App::run();
