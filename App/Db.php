<?php

namespace App;
use App\DbException;
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
           throw new \App\DbException( 'Ошибка подключения к БД');

        }
    }

    public function query($sql, $class , $data=[])
    {
        try {

            $sth = $this->dbh->prepare($sql);

            $res = $sth->execute($data);
        } catch ( \PDOException $error ) {
            include __DIR__ . '/../App/Templates/errors.tmpl.php';
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
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
