<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 20.10.17
 * Time: 14:40
 */

namespace TestMVC\App\Models;


use TestMVC\Core\Model;

class Site extends Model
{
    public function __construct()
    {
        parent::__construct();//, $this->fields);
    }
}