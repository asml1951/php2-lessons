<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 06.04.2018
 * Time: 11:06
 */

namespace App;


use App\Models\View;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access() : bool
    {
       // return isset($_GET['name'])&& 'Tom' == $_GET['name'];
        return true;
    }


     public function __invoke()
     {
         if($this->access()) {
             $this->handle();
         } else {
             die ('Нет доступа');
         }

     }

     abstract protected function handle();


}