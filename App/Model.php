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
            [],
            static::class
        );
    }

    public static function findById($id)
    {

        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=' . $id;

        $res = $db->query(
            $sql,
            static::class,
            []
        )[0];   //Исправвлено. $res стал объектом.
        if (!empty($res)) {
            return $res;
        } else {
            return false;
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
        if (!empty($res)) {
            return $res;
        } else {
            return false;
        }

    }
}

