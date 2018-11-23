<?php

namespace App;
use App\Exceptions\DbException;
use App\Exceptions\SQLException;
use App\Models\View;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = (include __DIR__ . '/config.php')['db'];
        
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
           throw new DBException('Ошибка подключения к БД');

        }
    }

    public function query($sql, $class , $data=[])
    {


            $sth = $this->dbh->prepare($sql);
            try {

                $res = $sth->execute($data);

            } catch (\PDOException $error){
                throw new SQLException($sql,'Не удалось выполнить запрос!');
            }
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        try {
            $result = $sth->execute($params);
        } catch (\PDOException $error) {
            throw new SQLException($sql,'Не удалось выполнить запрос!');
        }
        return $result;

    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }

}
