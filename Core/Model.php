<?php

namespace TestMVC\Core;


use TestMVC\Core\Interfaces\IDatabase;
use \PDOStatement;
use TestMVC\Core\Interfaces\IModel;

class Model implements IModel
{
    protected $db;
    protected $tableName;
    //protected $fields = [];

    public function __construct(IDatabase $db, string $tableName)//, array $fields)
    {
        $this->db = $db;
        $this->tableName=$tableName;
        //$this->fields=$fields;
    }

    public function getName() : string
    {
        return $this->tableName;
    }

    public function insert(array $params) :PDOStatement
    {
        return $this->db->insert($this->tableName,$params);
    }
    public function update(int $id, array $params) :PDOStatement
    {
        return $this->db->update($this->tableName,$id,$params);
    }
    public function delete(int $id) :PDOStatement
    {
        return $this->db->delete($this->tableName,$id);
    }
    public function get(int $id) :PDOStatement
    {
        return $this->db->get($this->tableName,$id);
    }
    public function getAll() :PDOStatement
    {
       return $this->db->getAll($this->tableName);
    }
    public function query(string $query) :PDOStatement
    {
        return $this->db->query($query);
    }
}