<?php

namespace TestMVC\Core\Interfaces;


interface IRegistry
{

    public function __construct(array $vars);
    public function __get($key);
    public function __set($key,$value);
}