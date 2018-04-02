<?php

require __DIR__ . '/../autoload.php';

$data = \App\Models\Article::getLatestNews();
var_dump($data);