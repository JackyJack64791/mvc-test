<?php

namespace TestMVC\Core\Interfaces;
use \PDOStatement;

interface IModel
{
    public function getName() : string;
    public function insert(array $params): PDOStatement;
    public function update(int $id, array $params) :PDOStatement;
    public function delete(int $id) :PDOStatement;
    public function get(int $id) :PDOStatement;
    public function getAll() :PDOStatement;
    public function query(string $query) :PDOStatement;
}