<?php

/**
 * @author Alex Smolin alex@mail.ru
 */

namespace App\Models;


use App\Model;

/**
 * Class Author описывает авторов статей
 * @package App\Models
 */
class Author extends Model
{
    /**
     * @var string
     */
    public const TABLE = 'authors';

    public $first_name;

    public $last_name;


}