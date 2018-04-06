<?php

require __DIR__ . '/autoload.php';

$view = new \App\Models\View();

$view->articles = \App\Models\Article::findAll() ;


//$author = \App\Models\Author::findById(3);



$view->display(__DIR__ . '/App/Templates/index.tmpl');

//require_once('App/Templates/index.tmpl');




