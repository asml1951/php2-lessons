<?php

require __DIR__ . '/../autoload.php';

\App\Models\Article::deleteById($_GET['id']);

echo 'Новость №' . $_GET['id'] . 'была удалена';