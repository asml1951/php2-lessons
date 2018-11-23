<?php

namespace App\Models;

use App\Db;
use App\MultiException;
use App\Model;

class Article extends Model
{

    public const TABLE = 'news';

    public $title;
    public $content;
    public $author_id;



    protected function validateTitle($title)
    {
        if(strlen($title) <= 3) {
            return ['valid' =>false,'msg' =>'Длина заголовка меньше 3 символов!'
            ];
        }
        return true;
    }

    protected function validateContent($content)
    {
        if(strlen($content) <= 10) {
            return ['valid' =>false,'msg' => 'Длина контента меньше 10 символов! '];
        }
        return true;
    }

    protected function validateAuthor_id($author_id)
    {

        if(empty($author_id)) {
            return ['valid' => false,'msg' =>'Нет id  автора! '];
        }
        return true;
    }



}


