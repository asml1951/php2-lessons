<?php

namespace App;

use App\Models\GetSetMagic;
use App\Exceptions\Multiexception;

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
           static::class ,
            []
        );
    }

    public function isNew()
    {
        return !isset($this->id);
    }

    public function save()
    {
        if ($this->isNew()) {
            return  $this->insert();
        } else {
            return $this->update();
        }
    }

    public function fill (Array $data)
    {

       $errors = new Multiexception();
       foreach ($data as $key => $value) {
           $validator = 'validate' . ucfirst($key);
           if (method_exists($this,$validator)) {
               $result = $this->$validator($value);
               if (false === $result['valid']){
                   $errors->add(new \Exception($result['msg']), $key);
                   continue;
               } else {
                   $this->$key = $value;
               }
           }
       }

       if(!$errors->isEmpty()) {
           throw $errors;
       }
       return true;


    }

    public static function findById($id)
    {

        $db = new Db();
        $sql = 'SELECT *  FROM ' . static::TABLE . ' WHERE id=:id';
        $result = $db->query(
            $sql,
            static::class,
            [':id' => $id]
        );
        return $result ? $result[0] : null;
    }

    public static function deleteById($id)
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $res = $db->execute($sql,[':id' => $id]);
    }

    public function insert()
    {
        $fields = get_object_vars($this);
        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }
        $sql = 'INSERT INTO ' . static::TABLE . '(' . implode (',', $cols) . ') 
        VALUES(' . implode(',',array_keys($data)) .')';

        $db = new Db();
        $res = $db->execute($sql,$data);
        $this->id = $db->getLastId();
    }

    function update()
    {
        $fields = get_object_vars($this);
        $cols = [];
        $data = [];
        $sql = '';

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
            $sql = $sql . $name . '=\'' . $value . '\',';
        }

        $sql = rtrim($sql,',');

        $sql = 'UPDATE ' . static::TABLE . ' SET ' . $sql . ' WHERE id= ' . $this->id;
        echo $sql;
        $db = new Db();
        $res = $db->execute($sql,$data);

    }

    public static function getLatestNews()
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT 3';

        $res = $db->query(
            $sql,
            [],
            static::class
        );
        if (!empty($res)) {
            return $res;
        } else {
            return false;
        }

    }
}

