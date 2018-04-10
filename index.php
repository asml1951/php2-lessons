<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\Article::getLatestNews();

require_once(__DIR__ . '/App/Templates/index.tmpl');
