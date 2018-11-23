<?php

namespace App\Exceptions;

class MultiException extends \Exception
{
    protected $errors = [];

    public function add(\Exception $e, $key)
    {
        $this->errors[$key] = $e;
    }

    public function all()
    {
        return $this->errors;
    }

    public function isEmpty()
    {
        return empty($this->errors);
    }

}