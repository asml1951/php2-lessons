<?php

function __autoload($class)
{
//    echo 'autoload =  ' . $class . '<br>';
//    echo (__DIR__ . '/../' . str_replace('\\','/',$class) . '.php');
    require __DIR__ . '/../' . str_replace('\\', '/', $class) . '.php';

}
