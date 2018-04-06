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
use App\Models\View;


class index extends Controller
{
    protected function handle()
    {


        $this->view->articles = Article::findAll() ;

        $this->view->display(__DIR__ . '/../../App/Templates/index.tmpl');

    }

}