<?php

require __DIR__ . '/autoload.php';

$data = \App\Models\Article::getLatestNews();

require_once('App/Templates/index.tmpl');
