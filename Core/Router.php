<?php

namespace TestMVC\Core;


use TestMVC\Core\Interfaces\IRouter;

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
        $this->bootstrap->routeTable = $this->routeTable;
    }
    public function init()
    {
        //TODO:: register rules for routes and controllers and fill routeTable
    }
    public function addRoute(string $url)
    {
        //TODO:: rework with $_SERVER['PATH_INFO'] and $_SERVER['']
        $this->urlArray = parse_url($url);


        $this->parseParams();
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