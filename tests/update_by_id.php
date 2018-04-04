<?php

require __DIR__ . '/../autoload.php';

$data = \App\Models\Article::findById(33);
var_dump($data);
$article = $data[0];
$article->title = 'New title';
$article->content = 'New content';
//var_dump($article);

$article->update();
*/
