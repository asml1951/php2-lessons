<?php


//namespace App;
/**
 * Class Config
 * реализует п.1 и п.4 ДЗ2:
 * "Добавьте в свое приложение класс App\Config. Объект этого класса при создании должен читать и сохранять в себе файл конфигурации. Его применение:
$config = new \App\Config;
echo $config->data['db']['host'];
 * * Изучите что такое синглтон (слайды + консультация в чате поддержки) и сделайте класс App\Config синглтоном. "
 */

class Config
{
    public static $data;

    private static $instance;

    private function __construct()
    {
        echo 'Create new object ';
        self::$data = include __DIR__ . '/../config.php';
    }

    public static function getConfig()
    {
        if (empty(self::$instance)) {

            self::$instance = new self();

        } else {
            echo 'One object is already created!';
        }
        return self::$instance;
    }
}

$config = Config::getConfig();  // вывод:  Create new object
var_dump($config);              //         object(Config)[1]
unset($config);
$config2 = Config::getConfig();  //        One object is already created!

var_dump( $config2::$data['db']['host']);  //     string 'localhost' (length=9)

