<?php


require __DIR__ . '/../autoload.php';

use App\View;
use App\Models\Article;
use App\Models\Author;

$id = $_GET['id'];
$view = new View();
$article = Article::findById($id);
$au_id = $article->author_id;
if (isset($au_id)) {
    $article->author = Author::findById($au_id);
}

$view->article = $article;

$view->display(__DIR__ . '/Templates/article.tmpl.php');

