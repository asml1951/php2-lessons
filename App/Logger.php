<?php

namespace App;


class Logger
{
    private static $instance;
    private $fs;
    public const LOGFILE = __DIR__ . '/log.txt';

    private function __construct()
    {

        $this->fs = fopen(static::LOGFILE,"a+");
    }

    public static function getInstance()
    {
        if(empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function addMessage($msg,$file,$line)
    {
        $data = date('Y-m-d H:i:s') . ' ' . $msg . ' ' . $file
            . ' ' . $line ;
        fwrite($this->fs,$data . PHP_EOL);
        fclose($this->fs);
    }




}