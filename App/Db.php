<?php

namespace App;
use App\DbException;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = (include __DIR__ . '/сonfig.php')['db'];


        try {

            $this->dbh = new \PDO(
                'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
                $config['user'],
                $config['password'],
                [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                ]
            );

            $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $error)
        {
            /*Выдает красивое сообщение:
            Проблема с подключением к базе данных :
            SQLSTATE[HY000] [1045] Access denied for user 'rrr1'@'localhost' (using password: YES)
            В файле : /usr/home/smolin/test_SS/App/Db.php строка 23
            */
           throw new \App\DbException(
               '<div style="color:red;background-color: gold ;:">' . $error->getMessage() . '</div>' .
               '<div>В файле : ' . $error->getFile() . '  строка ' . $error->getLine() . '</div>');

            die;

        }
    }

    public function query($sql, $class , $data=[])
    {
        try {

            $sth = $this->dbh->prepare($sql);

            $res = $sth->execute($data);
        } catch ( \PDOException $error ) {
            echo 'Ошибка выполнения запроса к БД ' . $error->getMessage();
            die;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function queryEach($sql, $class , $data=[])
    {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        $sth->setFetchMode( \PDO::FETCH_CLASS, $class);

        while($row = $sth->fetch()) {
            yield $row;
        }
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $result = $sth->execute($params);
        return $result;

    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}
