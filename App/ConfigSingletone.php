<?php


namespace App;


class Config
{
    public  static $data ;

    private static $instance;

    private function __construct()
    {

    }

    public static function getConfig()
    {
        if (empty(self::$instance)) {
            self::$data = (include __DIR__ . '/../config.php')['db'];
            self::$instance = new self;
        }
        return self::$instance;
    }


}
