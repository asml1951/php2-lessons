<?php

require __DIR__ . '/../autoload.php';

if (!empty($_REQUEST)) {
    include __DIR__ . '/../Templates/update_article.tmpl';
} else {


    $data = \App\Models\Article::findById($_GET['id']);
    var_dump($data);
    $article = $data[0];
    $article->title = 'New title';
    $article->content = 'New content';

    $article->update();
    echo '<h2>Новость обновлена!</h2>';
}