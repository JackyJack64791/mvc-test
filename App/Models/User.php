<?php

namespace TestMVC\App\Models;


use TestMVC\Core\Interfaces\IDatabase;
use TestMVC\Core\Model;

class User extends Model
{
    protected $tableName = 'user';
    //protected $fields = ['name'];
    public function __construct()
    {
        parent::__construct();//, $this->fields);
        parent::findTable($this->tableName);
    }




}