<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\Article::getLatestNews();

require __DIR__ . '/App/Templates/index.tmpl.php';




