<?php
/**
 * Created by PhpStorm.
 * User: smolin
 * Date: 05.04.2018
 * Time: 13:42
 */

namespace App\Models;


use App\Model;

class Author extends Model
{
    public const TABLE = 'authors';

    public $first_name;

    public $last_name;


}