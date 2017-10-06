<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 06.10.17
 * Time: 16:35
 */

namespace TestMVC\App\Models;


use TestMVC\Core\Databases\IDatabase;
use TestMVC\Core\Model;

class User extends Model
{
    public function __construct(IDatabase $db)
    {
        parent::__construct($db, 'user');
    }

    public function get_users()
    {

    }
}