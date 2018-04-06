<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 06.04.2018
 * Time: 11:25
 */

namespace App\Controllers;
use App\Controller;

class Article extends Controller
{
    public function handle()  //makes object callable
    {
       $this->view->article = \App\Models\Article::findById($_GET['id']);

        $this->view->display(__DIR__ . '/../../App/Templates/article.tmpl');
    }

}