<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 12.04.2018
 * Time: 9:15
 */

namespace App\Exceptions;

class SQLException extends \Exception
{
    protected $query;

    public function __construct($query,$message = "", $code = 0, Throwable $previous = null)
    {
        $this->query = $query;
        parent::__construct($message, $code, $previous);
    }

    public function getQuery()
    {
        return $this->query;
    }

}