<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 13.04.2018
 * Time: 15:34
 */

namespace App;


class Errors extends \Exception
{
    protected $errors = [];

    public function add(\Exception $e)
    {
        $this->errors[] = $e;
    }

    public function all()
    {
        return $this->errors;
    }

    public function empty()
    {
        return empty($this->errors);
    }

}