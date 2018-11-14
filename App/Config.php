<?php


namespace App;
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

    }

    public static function getConfig()
    {
        if (empty(self::$instance)) {
            self::$data = (include __DIR__ . '/../config.php');
            self::$instance = new self;
        }
        return self::$instance;
    }



}