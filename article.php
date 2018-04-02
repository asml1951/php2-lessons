<?php

require __DIR__ . '/autoload.php';

$id = $_GET['id'];

$article = \App\Models\Article::findById($id);

require_once ('App/Templates/article.tmpl');
