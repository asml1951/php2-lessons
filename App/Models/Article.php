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

    public function  __get($prop)
    {
        if ($prop === 'author') {
            return Author::findById($this->author_id);
        } else {
            return null;
        }
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

