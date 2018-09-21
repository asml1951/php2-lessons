<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 26.03.2018
 * Time: 17:08
 */
function __autoload($class)
{

    require __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

}