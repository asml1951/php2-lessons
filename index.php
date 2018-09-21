<?php

require __DIR__ . '/autoload.php';




//$config = \App\Config::getConfig();

$data = \App\Models\Article::getLatestNews();

require __DIR__ . '/App/Templates/index.tmpl.php';




