<?php

namespace TestMVC\Core;


use TestMVC\Core\Interfaces\IRouter;

class Router implements IRouter
{
    public $controller = '';
    public $action = '';
    private $uriArray = [];

    public function __construct()
    {
        $this->uriArray = explode('/', $_SERVER['REQUEST_URI']);
        print_r($this->uriArray);
    }
}