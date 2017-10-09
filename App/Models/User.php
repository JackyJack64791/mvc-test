<?php

namespace TestMVC\App\Models;


use TestMVC\Core\Databases\IDatabase;
use TestMVC\Core\Model;

class User extends Model
{
    protected $tableName = 'user';
    protected $fields = array();
    public function __construct(IDatabase $db)
    {
        parent::__construct($db, $this->tableName, $this->fields);
    }


}