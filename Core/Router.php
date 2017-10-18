<?php

namespace TestMVC\Core;


use TestMVC\Core\Interfaces\IRouter;
use TestMVC\App\Controllers;

class Router implements IRouter
{
    private $routeTable = [];
    private $urlArray = [];
    private $params = [];
    private $bootstrap;

    public function __construct()
    {
        $this->bootstrap = \Bootstrap::getInstance();
        $route = "http://php.net/manual/ru/function.parse-url.php?id=42&name=JohnCena";
    }
    public function init()
    {
        //TODO:: register rules for routes and controllers and fill routeTable
        $controllers = array_diff(scandir(__DIR__."/../App/Controllers"),["..","."]);
        foreach ($controllers as $value)
        {
            $this->addActions(str_replace(".php",'',$value));
        }
        print_r($controllers);

        $this->bootstrap->routeTable = $this->routeTable;
    }
    public function run()
    {
        et_class_method
    }
    public function addActions(string $value)
    {
        $methods = get_class_methods($value);
        if(!isset($methods)) echo "$value :c\n";
        print_r($methods);
    }
    private function parseUri()
    {

    }
    private function parseParams()
    {
        parse_str($this->urlArray['query'], $this->params);
        print_r($this->params);
    }



}