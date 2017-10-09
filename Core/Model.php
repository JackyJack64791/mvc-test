<?php

namespace TestMVC\Core;


use TestMVC\Core\Databases\IDatabase;
use \PDOStatement;

class Model
{
    protected $db;
    protected $tableName;
    protected $fields = array();

    public function __construct(IDatabase $db, string $tableName, array $fields)
    {
        $this->db = $db;
        $this->tableName=$tableName;
        $this->fields=$fields;
    }

    public function insert(array $params) :PDOStatement
    {
        return $this->db->insert($this->tableName,$params);
    }
    public function update(string $key, string $value, array $params) :PDOStatement
    {
        return $this->db->update($this->tableName,$key,$value,$params);
    }
    public function delete(string $key, string $value) :PDOStatement
    {
        return $this->db->delete($this->tableName,$key,$value);
    }
    public function get(string $key, string $value) :PDOStatement
    {
        return $this->db->get($this->tableName,$key,$value);
    }
    public function get_all() :PDOStatement
    {
       return $this->db->get_all($this->tableName);
    }
}