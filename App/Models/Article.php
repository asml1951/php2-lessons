<?php
/**
 * @author Alex Smolin alex@mail.ru
 */
namespace App\Models;

use App\Db;
use App\Model;

/**
 * Class Article связан с таблицей news
 * @package App\Models
 */
class Article extends Model
{

    /**
     * @var string Имя таблицы новостных статей
     */
    public const TABLE = 'news';

/** @var string */
    public $title;

    /** @var string */
    public $content;

    /**
     * Этот метод  возвращает все статьи новостей
     * @return array
     */
    public static function findAll()
    {
        $db = new Db();

        $sql = 'SELECT * FROM news';
        $res = $db->query(
            $sql,
            static::class,
            []
        );
        /**
         * Определяет имя и фамилию автора по его $id
         */
        foreach ($res as $article) {

            $au_id = $article->author_id;

            if (isset($au_id)) {
                $author = Author::findById($au_id);


                $article->author_id = $author[0]->first_name . ' ' . $author[0]->last_name;
            }




        }

        return $res;
    }
    }

