<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 06.04.2018
 * Time: 10:41
 */

namespace App\Controllers;

use App\AdminDataTable;
use App\Controller;
use App\Models\Article;
use App\Models\View;


class Admin extends Controller
{
    protected function handle()
    {


        $this->view->articles = Article::findAll() ;

        $this->view->adminTable = (new AdminDataTable((array)$this->view->articles,
            $this->getFuncArray()))->render();


        $this->view->display(__DIR__ . '/../../App/Templates/admin_panel_anonym.tmpl.php');

    }

    protected function getFuncArray() : array
    {
        return [
            function(Article $article)
            {
                return $article->title;
            },
            function(Article $article)
            {
                return $article->content;
            },
            function(Article $article)
            {
                return $article->author_id;
            },
            function (Article $article)
            {
                return '<a href="/update_article/?id=' . $article->id
                       . '">Редактировать</a>';
            },
            function (Article $article)
            {
                return '<a href="/delete_article/?id=' . $article->id
                    . '">Удалить</a>';
            }
        ];
    }

}
