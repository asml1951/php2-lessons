<?php

include __DIR__ . '/../App/autoload.php';


$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/',$uri);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';

try {
    $class = '\App\Controllers\\' . $ctrl;
    $ctrl = new $class();
    $ctrl();


} catch (\App\DbException  $error) {
    echo '<h3>Проблема с подключением к базе данных : ' .$error->getMessage() . '</h3>';
}  catch (\PDOException $error) {
    echo 'Ошибка выполнения запроса : ' . $error->getMessage();
    die;
}  catch(\App\NotFoundException $error) {
    echo 'Попытка найти несуществующий объект. ' . $error->getMessage();
}







