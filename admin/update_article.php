<?php

require __DIR__ . '/../autoload.php';
if (empty($_REQUEST['update'])) {
    $article = \App\Models\Article::findById($_GET['id']);
    include  __DIR__ . '/../App/Templates/update_article.tmpl.php';
} else {
    $article = \App\Models\Article::findById($_GET['id']);
    $article->title = $_REQUEST['title'];
    $article->content = $_REQUEST['content'];
    if(true == $article->save()){
        require __DIR__ . '/../App/Templates/article_updated.tmpl.php';
    } else {
        require __DIR__ . '/../App/Templates/failed.tmpl.php';
    }
}
