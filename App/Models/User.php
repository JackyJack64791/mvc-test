<?php

namespace TestMVC\App\Models;


use TestMVC\Core\Interfaces\IDatabase;
use TestMVC\Core\Model;

class User extends Model
{
    protected $tableName = 'user';
    //protected $fields = ['name'];
    public function __construct(IDatabase $db)
    {
        parent::__construct($db, $this->tableName);//, $this->fields);
    }




}