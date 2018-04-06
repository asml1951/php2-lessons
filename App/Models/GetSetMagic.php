<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 05.04.2018
 * Time: 13:03
 */

namespace App\Models;


trait GetSetMagic
{
    public function __get($name)
    {
        return $this->data[$name] ?? null;

    }

    public function __set($name,$value)
    {
        $this->data[$name]  = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

}