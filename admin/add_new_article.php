<?php
use App\Db;

require __DIR__ . '/../autoload.php';

if(!empty($_GET['title']) && !empty($_GET['content'])) {

    $article = new \App\Models\Article();

    $article->title = $_GET['title'];
    $article->content = $_GET['content'];

    if (true == $article->save()) {
        require __DIR__ . '/../App/Templates/article_added.tmpl.php';
    } else {
        require __DIR__ . '/../App/Templates/fail.tmpl.php';
    }
} else {
    require __DIR__ . '/../App/Templates/add_new_article.tmpl.php';
    }
