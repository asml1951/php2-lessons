<?php

namespace App;


trait GetSetMagic
{
    protected $data = [];

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