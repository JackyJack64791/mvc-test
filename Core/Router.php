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
        $array = explode('?', $_SERVER["REQUEST_URI"]);
        $this->urlArray = $array[0];
        parse_str($array[1],$this->params);
        if($this->urlArray=='/' || !isset($this->urlArray)) $this->urlArray="site/index";
        $this->urlArray = array_values(array_filter(explode('/',$this->urlArray),'strlen'));
        if(!isset($this->urlArray[1])) $this->urlArray[1] = "index";
        foreach ($this->routeTable as $value)
        {
            if($this->urlArray[0]==$value->getController() && $this->urlArray[1]==$value->getAction())
            {
                $controllerName = "TestMVC\App\Controllers\\".ucfirst($value->getController())."Controller";
                $action = $value->getAction()."Action";
                if(!is_callable(array($controllerName, $action))){
                    $this->notFound();
                    return;
                }
                $model = "TestMVC\App\Models\\".ucfirst($value->getController());
                $controller = new $controllerName(new $model);
                call_user_func(array($controller, $action),$this->params);
                return;
            }
        }
        $this->notFound();
    }

    public function notFound()
    {
        echo "<h2>404</h2>";
        var_dump($this->urlArray);
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