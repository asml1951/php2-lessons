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
use SebastianBergmann\Timer\Timer;


class Index extends Controller
{
    protected function handle()
    {
        $this->view->articles = Article::findAllUsingGenerator() ;
        $this->view->resources =$this->getResources();

        $this->view->display(__DIR__ . '/../../App/Templates/index.tmpl');

    }

    public function getResources()
    {
      return Timer::resourceUsage();

    }

}
