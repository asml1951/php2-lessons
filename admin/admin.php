<?php

require __DIR__ . '/../autoload.php';


$articles = (\App\Models\Article::findAll());


require __DIR__ . '/../App/Templates/admin_panel.tmpl.php';