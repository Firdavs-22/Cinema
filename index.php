<?php

spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filePath = __DIR__ . DIRECTORY_SEPARATOR  . $classPath . '.php';
    if (file_exists($filePath)) {
        require $filePath;
    }
});

use controller\UserController;

$db = include './config/db.php';

$app = new UserController($db,'user');

echo $app->actionIndex();