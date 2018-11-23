<?php

include __DIR__ . '/../App/autoload.php';

use SebastianBergmann\Timer\Timer;
use App\Models\View;
use App\Exceptions\DbException;
use App\Exceptions\SQLException;
use App\Exceptions\NotFoundException;

/*$ex = new \Exception('Ошибка',100);
var_dump($ex->getMessage());
*/

$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/',$uri);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';

try {
    $class = '\App\Controllers\\' . $ctrl;
    $ctrl = new $class();
    $ctrl();


} catch (DbException $error) {
    $log = \App\Logger::getInstance();
    $log->addMessage($error->getMessage(),$error->getFile(),$error->getLine());
    $view = new View();
    $view->error = $error;
    $view->display(__DIR__ . '/../App/Templates/dberror.tmpl.php');

}  catch (SQLException $error) {
    $log = \App\Logger::getInstance();
    $log->addMessage($error->getMessage(),$error->getFile(),$error->getLine());
    $view = new View();
    $view->error = $error;
    $view->display(__DIR__ . '/../App/Templates/sqlerror.tmpl.php');

}  catch(NotFoundException $error) {
    $view = new View();
    $view->error = $error;
    $view->display(__DIR__ . '/../App/Templates/not_found.tmpl.php');
}









