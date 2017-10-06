<?php

namespace TestMVC\Core;


use TestMVC\Core\Databases\IDatabase;

class Model
{
    protected $db;
    protected $tableName;
    public function __construct(IDatabase $db, string $tableName)
    {
        $this->db = $db;
        $this->tableName = $tableName;
    }

    public function connection(string $user, string $password)
    {
        $this->db = new \TestMVC\Core\Databases\MySQLDatabase('db','localhost');
        $this->db->open_connection('testroot','12345');
    }
    public function insert(array $params)
    {

    }
    public function update()
    {

    }
    public function delete()
    {

    }
    public function get(int $id)
    {

    }
    public function get_all(): string
    {
        $query = 'SELECT * FROM $this->tableName';
       // $this->db->dbconnection
    }
}