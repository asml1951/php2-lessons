<?php

include __DIR__ . '/../App/autoload.php';

use SebastianBergmann\Timer\Timer;



$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/',$uri);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';

try {
    $class = '\App\Controllers\\' . $ctrl;
    $ctrl = new $class();

    $ctrl();


} catch (\App\DbException  $error) {
    $log = \App\Logger::getInstance();
    $log->addMessage($error->getMessage(),$error->getFile(),$error->getLine());
    include __DIR__ . '/../App/Templates/errors.tmpl.php';

}  catch (\PDOException $error) {
    $log = \App\Logger::getInstance();
    $log->addMessage($error->getMessage(),$error->getFile(),$error->getLine());
    include __DIR__ . '/../App/Templates/pdo_exception_error.tmpl.php';

}  catch(\App\NotFoundException $error) {
    include __DIR__ . '/../App/Templates/errors.tmpl.php';
}









