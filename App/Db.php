<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    {
        $config = (include __DIR__ . '/../config.php')['db'];

        $opt = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ];

        $this->dbh = new \PDO(
            'mysql:host='.$config['host'] . ';dbname=' .$config['dbname'],
            $config['user'],
            $config['password'],
            $opt
        );
    }

    public function query($sql, $class, $data=[] )
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($sql, $params = [])
    {
        $stmt = $this->dbh->prepare($sql);
        return $stmt->execute($params);


    }

}