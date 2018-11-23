<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 09.04.2018
 * Time: 9:58
 */

namespace App\Controllers;
use App\Controller;
use App\Models\Article;
use App\Db;
use App\Exceptions\MultiException;


class Add_new_article extends Controller
{
    public function handle()  //makes object callable
    {
        if(!empty($_GET)) {

            $article = new Article();
            try {
                $article->fill($_GET);
            } catch (MultiException $er) {

                $this->view->errors = $er->all();
                $this->view->display(__DIR__ . '/../Templates/add_new_article.tmpl.php');
             die;
            }

            $article->save();
            $this->view->display( __DIR__ . '/../Templates/article_created.tmpl');

        } else {

            $this->view->display(__DIR__ . '/../Templates/add_new_article.tmpl.php');
        }


    }

}