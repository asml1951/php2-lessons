<?php
use App\Db;
use App\Models\Article;
use App\Models\Author;
use App\View;

require __DIR__ . '/../../autoload.php';

if(!empty($_REQUEST)) {

    $article = new Article();

    $article->title = $_GET['title'];
    $article->content = $_GET['content'];
    $article->author_id = $_GET['author_id'];
    $article->save();
    $view = new View();
    $view->article = $article;

    $view->display(__DIR__ . '/../Templates/new_article_created.tmpl.php');

} else {

    $view = new \App\View();
   $view->authors = Author::findAll();
    $view->display(__DIR__ . '/../Templates/add_new_article.tmpl.php');

}