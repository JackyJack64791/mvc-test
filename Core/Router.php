<?php

namespace TestMVC\Core;


use TestMVC\Core\Interfaces\IRouter;
use TestMVC\App\Controllers;
use TestMVC\Core\Route;

class Router implements IRouter
{
    private $routeTable = [];
    private $urlArray = [];
    private $params = [];
    private $bootstrap;

    public function __construct()
    {
        $this->bootstrap = \Bootstrap::getInstance();
    }
    public function init()
    {
        $controllers = array_diff(scandir(__DIR__."/../App/Controllers"),["..","."]);
        foreach ($controllers as $value)
        {
            $this->addActions(str_replace(".php",'',$value));
        }

        $this->bootstrap->routeTable = $this->routeTable;
        $this->bootstrap->getLogger()->logOk(2);
    }
    public function run()
    {
        //TODO::Rework it;
        $url="site/index?id=5";
        //$url = strtok($_SERVER["REQUEST_URI"],'?');
        //parse_str($_SERVER["QUERY_STRING"],$params);
        if($url=='/' || !isset($url)) $url="site/index";
        $url = array_values(array_filter(explode('/',$url),'strlen'));
        if(!isset($url[1])) $url[1] = "index";
        foreach ($this->routeTable as $value)
        {
            if($url[0]==$value->getController() && $url[1]==$value->getAction())
            {
                $controllerName = "TestMVC\App\Controllers\\".ucfirst($value->getController())."Controller";
                $action = $value->getAction()."Action";
                if(!is_callable(array($controllerName, $action))){
                    $this->notFound($url);
                    return;
                }
                $model = "TestMVC\App\Models\\".ucfirst($value->getController());
                $controller = new $controllerName(new $model);
                call_user_func_array([$controller, $action],$params);
                return;
            }
        }
        $this->notFound($url);
    }

    public function notFound($url)
    {
        echo "<h2>404</h2>";
        var_dump($url);
    }
    public function addActions(string $controller)
    {
        $methods = $this->filterActions(get_class_methods("TestMVC\App\Controllers\\".$controller));

        foreach ($methods as $value)
        {
            $route = new Route(
                strtolower(str_replace("Controller",'',$controller)),
                strtolower(str_replace("Action",'',$value)));
            $this->routeTable[] = $route;
        }
    }
    private function filterActions(array $methods)
    {
        return array_diff($methods,
            [ "__construct", "__destruct", "__call", "__callStatic", "__get", "__set", "__isset", "__unset",
                "__sleep", "__wakeup", "__toString", "__invoke", "__set_state", "__clone","__debugInfo"]);
    }



}