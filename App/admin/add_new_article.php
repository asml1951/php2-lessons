<?php
use App\Db;

require __DIR__ . '/../autoload.php';

if(!empty($_REQUEST)) {

    $article = new \App\Models\Article();

    $article->title = $_GET['title'];
    $article->content = $_GET['content'];

    $article->insert();
    echo '<h3>Новость создана!</h3>';

} else {


    include __DIR__ . '/../Templates/add_new_article.tmpl.php';
}