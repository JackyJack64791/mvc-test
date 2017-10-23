<?php

namespace TestMVC\Core\Interfaces;
use \PDOStatement;

interface IModel
{
    public function getName() : string;
    public function insert(array $params): array;
    public function update(int $id, array $params) :array;
    public function delete(int $id) :array;
    public function get(int $id) :array;
    public function getAll() :array;
    public function query(string $query) :array;
}