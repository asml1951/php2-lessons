<?php

function __autoload($class)
{
    __DIR__ . '/' . str_replace('\\', '/', $class) . '.php'
    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

}