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
/* Не понимаю зачем нужен  метод isNew. В таблице news поле id autoincrement.
Если я создаю новую статью новостей его значение присваивается автоматически.
Если я хочу отредактировать статью, ее id мне известен( на админ панели имеется кнопка-ссылка "редактировать",
id содержится в этой ссылке). Нажимая на эту кнопку, я попадаю на страницу редактирования новости.
*/
    public function isNew()
	 {
	 	return empty($this->id);
	 }

    public static function findById($id)
    {

        $db = new Db();
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=' . $id;
        
        $res = $db->query(
            $sql,
            static::class,
            [],
        );
        if (!empty($res)) {
            return $res;
        } else {
            return false;
        }
    }

    public static function deleteById($id)
    {
        $db = new Db();
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=' . $id;
        $res = $db->execute($sql,[]);
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

