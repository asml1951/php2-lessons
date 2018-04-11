<?php
/**
 * @author Alex Smolin alex@mail.ru
 */
namespace App\Models;

use App\Model;

/**
 * Class User
 * @package App\Models
 */
class User extends Model
{
    /**
     * @var string
     */
    public const TABLE = 'users';

    /** @var string */
    public $email;

    /** @var string */
    public $name;

}