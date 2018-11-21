<?php

require __DIR__ . '/../../autoload.php';

use App\Models\Article;
use App\Models\Author;
use App\View;


$view = new View();
$articles = Article::findAll();
$authors = Author::findAll();

foreach ($articles as $article) {

    $au_id = $article->author_id;

    if (isset($au_id)) {
        $article->author = Author::findById($au_id);
    }
}
$view->articles = $articles;
$view->authors = $authors;



$view->display(__DIR__ . '/../Templates/admin_panel.tmpl.php');