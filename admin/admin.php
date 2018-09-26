<?php

require __DIR__ . '/../autoload.php';

$view = new \App\View();

$view->articles = \App\Models\Article::findAll();
$view->authors = \App\Models\Author::findAll();

$view->display(__DIR__ . '/../App/Templates/admin_panel.tmpl.php');