<?php
session_start();

require 'vendor/autoload.php';

use vendor\Application;

$db = include './config/db.php';

function dd($data)
{
    echo '<pre>';
    print_r($data);
    die('</pre>');
}

$app = new Application($db);
$app->run();


$app->end();