<?php

require __DIR__ . '/../autoload.php';

$data = \App\Models\Article::findById(3);
var_dump($data);