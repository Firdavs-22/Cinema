<?php
spl_autoload_register(function ($className) {
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filePath = str_replace('vendor', '', __DIR__) . DIRECTORY_SEPARATOR . $classPath . '.php';
    if (file_exists($filePath)) {
        require $filePath;
    }
});