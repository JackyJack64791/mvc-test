<?php

namespace TestMVC\Core\Interfaces;
use \PDOStatement;

interface IModel
{
    public function insert(array $params): PDOStatement;
    public function update(int $id, array $params) :PDOStatement;
    public function delete(int $id) :PDOStatement;
    public function get(int $id) :PDOStatement;
    public function get_all() :PDOStatement;
    public function query(string $query) :PDOStatement;
}