<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{

    public const TABLE = 'news';

    public $title;
    public $content;

    public static function findAll()
    {
        $db = new Db();

        $sql = 'SELECT * FROM news';
        $res = $db->query(
            $sql,
            static::class,
            []
        );


        foreach ($res as $article) {

            $au_id = $article->author_id;

            if (isset($au_id)) {
                $author = Author::findById($au_id);


                $article->author_id = $author->first_name . ' ' . $author->last_name;
            }




        }
 //    var_dump($res);
        return $res;
    }
    }

