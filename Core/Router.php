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
        //$url = $_SERVER["REQUEST_URI"];
        $url = explode('/',"site/index");
        var_dump($this->routeTable[3]);
        foreach ($this->routeTable as $value)
        {
            if($url[0]==$value->getController() && $url[1]==$value->getAction())
            {
                $controllerFile = __DIR__."/../App/Controllers/".ucfirst($value->getController())."Controller.php";
                $action = $value->getAction()."Action";
                if(file_exists($controllerFile))
                {
                    include $controllerFile;
                }
                if(!is_callable(array($controllerFile, $action))){
                    header("HTTP/1.0 404 Not Found");
                    return;
                }

                call_user_func_array(array($controllerFile, $action),[]);

            }
            header("HTTP/1.0 404 Not Found");
        }
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