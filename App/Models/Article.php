<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{

    public const TABLE = 'news';

    public $title;
    public $content;

    public static function getLatestNews()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT 3';

        $res = $db->query(
            $sql,
            static::class,
            []
        );
        if (!empty($res)) {
            return $res;
        } else {
            return false;
        }

    }

}