<?php

include __DIR__ . '/../App/autoload.php';


$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/',$uri);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';

try {
    $class = '\App\Controllers\\' . $ctrl;
    $ctrl = new $class();
    $ctrl();

} catch (App\DbException $error) {
    echo 'Ошибка выполнения запроса к БД' . $error->getMessage();
    die;
}







