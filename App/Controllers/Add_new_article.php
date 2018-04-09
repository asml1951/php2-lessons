<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 09.04.2018
 * Time: 9:58
 */

namespace App\Controllers;
use App\Controller;
use App\Db;




class Add_new_article extends Controller
{
    public function handle()  //makes object callable
    {
        if(!empty($_REQUEST)) {

            $article = new \App\Models\Article();

            $article->title = $_GET['title'];
            $article->content = $_GET['content'];
            $article->author_id = $_GET['author_id'];
            $article->insert();
            $this->view->display( __DIR__ . '/../Templates/article_created.tmpl');

        } else {

            $this->view->display(__DIR__ . '/../Templates/add_new_article.tmpl');
        }


    }

}