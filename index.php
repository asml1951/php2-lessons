<?php

require __DIR__ . '/autoload.php';

$view = new \App\Models\View();

var_dump(\App\Models\Article::findAll());
$view->articles = \App\Models\Article::findAll() ;


//$author = \App\Models\Author::findById(3);



$view->display(__DIR__ . '/App/Templates/index.tmpl');

//require_once('App/Templates/index.tmpl');




