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

    public function isNew()
	 {
	 	return !isset($this->id);
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

    public static function deleteById($id) : bool
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        return $db->execute($sql,[':id' => $id]);
    }

    public function save()
    {
        if ($this->isNew()) {

           return  $this->insert();

        } else {

           return $this->update();

        }

    }

    public function insert() : bool
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
        return $res;
    }

    function update() : bool
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
        return $db->execute($sql,$data);

    }
}

