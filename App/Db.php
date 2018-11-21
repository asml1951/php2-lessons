<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = \App\Config::getInstance();
        $this->dbh = new \PDO(
            'mysql:host=' . $config->data['db']['host'] .
            ';dbname=' . $config->data['db']['dbname'],
            $config->data['db']['user'],
            $config->data['db']['password'],
            [
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]
        );
        $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function query($sql, $class, $data=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
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
