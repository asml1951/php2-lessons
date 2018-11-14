<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'];

$article = \App\Models\Article::findById($id);

require  __DIR__ . '/App/Templates/article.tmpl.php';
