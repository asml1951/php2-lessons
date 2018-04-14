<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 09.04.2018
 * Time: 11:34
 */

namespace App\Controllers;
use App\Controller;
use App\Db;


class Update_article extends Controller
{
    public function handle()
    {
        if (!empty($_GET['check']) && 1 == $_GET['check']) {
            $art = \App\Models\Article::findById($_GET['id']);
            $art->title = $_GET['title'];
            $art->content = $_GET['content'];
            $art->author_id = $_GET['author_id'];
            $art->update();

        } else {

            $this->view->article = \App\Models\Article::findById($_GET['id']);




            //           $article->update();

            $this->view->display(__DIR__ . '/../Templates/update_article.tmpl');

        }

    }
}