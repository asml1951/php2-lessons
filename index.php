<?php

require __DIR__ . '/autoload.php';

$view = new \App\View();

$view->articles = \App\Models\Article::getLatestNews();

$view->display(__DIR__ . '/App/Templates/index.tmpl.php');





