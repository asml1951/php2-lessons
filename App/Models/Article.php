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

    public $author_id;

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

        foreach ($res as $article) {

            $au_id = $article->author_id;

            if (isset($au_id)) {
                $article->author = Author::findById($au_id);
            }
        }
        return $res;
    }

    public static function findById($id)
    {

        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';

        $res = $db->query(
            $sql,
            static::class,
            [':id' => $id]
        );

        $article = $res ? $res[0] : null;
        $au_id = $article->author_id;
        if (isset($au_id)) {
            $article->author = Author::findById($au_id);
        }
        return $article;
    }

    public static function getLatestNews()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT 3';
        $res = $db->query(
            $sql,
            static::class,
            []
        );
        return $res;
    }
    }

