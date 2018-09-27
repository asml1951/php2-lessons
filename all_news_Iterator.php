<?php
require __DIR__ . '/autoload.php';

use App\View;
use App\Models\Article;
$view = new View();

$articles = (array)Article::findAll();
foreach ($articles as $key => $val){
    $view->{$key} = $val;
}

$view->display(__DIR__ . '/App/Templates/all_news_Iterator.tmpl.php' );