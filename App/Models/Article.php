<?php

namespace App\Models;

use App\Db;
use App\Errors;
use App\Model;

class Article extends Model
{

    public const TABLE = 'news';

    public $title;
    public $content;
    public $author_id;

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
        return $res;
    }

    public function fill (Array $data)
{
    var_dump($data);
    $this->title = $data[0];
    $this->author_id = $data[1];
    $this->content = $data[2];

    $errors = new Errors();

    if(empty($this->title)){
        $errors->add(new \Exception('Заголовок статьи не должен быть пустым!'));
    }
    if(!is_numeric($this->author_id)) {
        $errors->add(new \Exception('Id автора должно быть целым числом!'));
    }
    if(strlen($this->content) < 5) {
        $errors->add(new \Exception('GGGGGДлина сообщения не менее 5 символов!'));
    }


    if (!$errors->empty()) {
        throw $errors;


    }



}
}

