<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 06.04.2018
 * Time: 10:41
 */

namespace App\Controllers;

use App\Controller;
use App\Models\Article;
use App\Models\Author;
use App\Models\View;
use SebastianBergmann\Timer\Timer;


class Index extends Controller
{
    protected function handle()
    {
        $articles = Article::findAll();
        foreach ($articles as $article) {
            $au_id = $article->author_id;
            if (isset($au_id)) {
                $article->author = Author::findById($au_id);
            }
        }


        $this->view->articles = $articles;
        $this->view->resources =$this->getResources();

        $this->view->display(__DIR__ . '/../../App/Templates/index.tmpl');

    }

    public function getResources()
    {
      return Timer::resourceUsage();

    }

}
