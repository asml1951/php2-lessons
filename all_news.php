<?php
require __DIR__ . '/autoload.php';

use App\View;
use App\Models\Article;


$view = new View();
$view->articles = Article::findAll();
$view->display(__DIR__ . '/App/Templates/all_news.tmpl.php');