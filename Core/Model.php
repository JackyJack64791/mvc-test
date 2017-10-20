<?php

namespace TestMVC\Core;


use TestMVC\Core\Interfaces\IDatabase;
use \PDOStatement;
use TestMVC\Core\Interfaces\IModel;

class Model implements IModel
{
    protected $db;
    protected $tableName;
    protected $bootstrap;
    //protected $fields = [];

    public function __construct()
    {
        $this->bootstrap = \Bootstrap::getInstance();
        $this->db = $this->bootstrap->db;
    }

    public function findTable(string $tableName)
    {
        $this->tableName=$tableName;
    }

    public function validate()
    {
        if(!isset($this->tableName)) {
            $this->bootstrap->getLogger()->logError(41);
            return false;
        }
        else return true;
    }
    public function getName() : string
    {
        return ($this->validate()) ? $this->tableName : null;
    }

    public function insert(array $params) :PDOStatement
    {
        if($this->validate()) return $this->db->insert($this->tableName,$params);
    }
    public function update(int $id, array $params) :PDOStatement
    {
        if($this->validate()) return $this->db->update($this->tableName,$id,$params);
    }
    public function delete(int $id) :PDOStatement
    {
        if($this->validate()) return $this->db->delete($this->tableName,$id);
    }
    public function get(int $id) :PDOStatement
    {
        if($this->validate()) return $this->db->get($this->tableName,$id);
    }
    public function getAll() :PDOStatement
    {
        if($this->validate()) return $this->db->getAll($this->tableName);
    }
    public function query(string $query) :PDOStatement
    {
        if($this->validate()) return $this->db->query($query);
    }
}