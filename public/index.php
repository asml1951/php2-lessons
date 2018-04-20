<?php

include __DIR__ . '/../App/autoload.php';
use App\Db;
use App\ConfigSingletone;
// Прверка метода QueryEach()
 /* $db = new \App\Db();
$sql =  'SELECT * FROM news';
$class = 'App\Models\Article';
$data = [];
//$db->query($sql,$class,$data);
foreach($db->queryEach($sql,$class,$data) as $article) {
    var_dump($article);
}  */


var_dump(\App\ConfigSingletone::getConfig()::$data);
var_dump(\App\ConfigSingletone::getConfig()::$data['dbname']);

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







