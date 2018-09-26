<?php


require __DIR__ . '/autoload.php';

$id = $_GET['id'];
$view = new \App\View();
$view->article = \App\Models\Article::findById($id);

$view->display(__DIR__ . '/App/Templates/article.tmpl.php');

