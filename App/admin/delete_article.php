<?php

require __DIR__ . '/../../autoload.php';

$article =\App\Models\Article::findById($_GET['id']);

$result = $article->delete();
if (true == $result){

    require __DIR__ . '/../Templates/article_deleted.tmpl.php';

} else {

    require __DIR__ . '/../Templates/faile.tmpl.php';
    
}
