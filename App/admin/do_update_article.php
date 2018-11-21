<?php

require __DIR__ . '/../../autoload.php';

$article = \App\Models\Article::findById($_GET['id']);
$article->title = $_REQUEST['title'];
$article->content = $_REQUEST['content'];

if(true == $article->save()){
    require __DIR__ . '/../Templates/article_updated.tmpl.php';
} else {
    require __DIR__ . '/../Templates/failed.tmpl.php';
}
