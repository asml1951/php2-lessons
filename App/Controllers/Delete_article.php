<?php


namespace App\Controllers;
use App\Controller;
use App\Db;
use App\Models\Article;


class Delete_article extends Controller
{
    public function handle()
    {

        \App\Models\Article::deleteById($_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/article_deleted.tmpl');
    }
}