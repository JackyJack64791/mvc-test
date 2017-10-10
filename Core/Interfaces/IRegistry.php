<?php

namespace TestMVC\Core\Interfaces;


abstract class IRegistry
{
    protected $vars = [];

    public abstract function __construct(array $vars);
    public abstract function __get($key);
    public abstract function __set($key,$value);
}