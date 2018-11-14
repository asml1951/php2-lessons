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

/* п.5 ДЗ2:  Добавьте к моделям метод delete()     */
    public   function delete() : bool
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        return $db->execute($sql,[':id' => $this->id]);
    }

    public function save()
    {
        if ($this->isNew()) {

           return  $this->insert();

        } else {

           return $this->update();

        }

    }
/*  п.3 ДЗ2 : Если же уже изучили update() - напишите метод insert(). Он вставляет в базу данных новую запись, основываясь на данных объекта. Не забудьте, что после успешной вставки вы должны заполнить свойство id объекта!   */
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

    $sql = 'INSERT INTO ' . static::TABLE . '(' . implode(',', $cols) . ') 
        VALUES(' . implode(',', array_keys($data)) . ')';

    $db = new Db();
    $res = $db->execute($sql, $data);

    /*  п.3 ДЗ2: Не забудьте, что после успешной вставки вы должны заполнить свойство id объекта! */

    if (true == $res) {
        $this->id = $db->getLastId();
    }
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
        $db = new Db();
        return $db->execute($sql,$data);

    }
}

