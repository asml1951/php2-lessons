<?php

require __DIR__ . '/../../autoload.php';
$result = \App\Models\Article::deleteById($_GET['id']);
if (true == $result){
    require __DIR__ . '/../Templates/article_deleted.tmpl.php';
} else {
    require __DIR__ . '/../Templates/failed.tmpl.php';

};