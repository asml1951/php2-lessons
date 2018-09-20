<?php

namespace App;

abstract class Model
{
    public const TABLE = '';

    public $id;

    public static function findAll()
    {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query(
            $sql,
            static::class,
            []
        );
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
        return $res ? $res[0] : null;
    }

}

