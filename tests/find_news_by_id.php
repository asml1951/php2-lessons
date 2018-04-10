<?php

require __DIR__ . '/../autoload.php';

$data = \App\Models\Article::findById(43);
var_dump($data);