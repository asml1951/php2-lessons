<?php

require __DIR__ . '/App/autoload.php';

/*
$view = new \App\Models\View();

$view->articles = \App\Models\Article::findAll() ;

$view->display(__DIR__ . '/App/Templates/index.tmpl');
*/

$ctrl = $_GET['ctrl'] ?? 'Index';
$class = 'Controllers\\' . $ctrl;
$ctrl = new \App\Controllers\Index();
//$ctrl = new $class();
$ctrl();





