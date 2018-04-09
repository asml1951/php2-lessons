<?php

include __DIR__ . '/../App/autoload.php';

/*
$view = new \App\Models\View();

$view->articles = \App\Models\Article::findAll() ;

$view->display(__DIR__ . '/App/Templates/index.tmpl');
*/

$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/',$uri);

$ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';
$class = '\App\Controllers\\' . $ctrl;


$ctrl = new $class();
$ctrl();





