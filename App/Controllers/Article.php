<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 06.04.2018
 * Time: 11:25
 */

namespace App\Controllers;
use App\Controller;
use App\Exceptions\NotFoundException;


class Article extends Controller
{
    public function handle()  //makes object callable
    {
       $article =  \App\Models\Article::findById($_GET['id']);
       if (is_null($article)) {
           throw new NotFoundException( 'Ошибка 404 - новость № ' .$_GET['id'] . ' не найдена!');
       }
       $this->view->article = $article;
       $this->view->display(__DIR__ . '/../../App/Templates/article.tmpl');
    }

}