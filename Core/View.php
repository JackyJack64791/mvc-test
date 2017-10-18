<?php

namespace TestMVC\Core;

use TestMVC;
use TestMVC\Core\Interfaces\IView;

class View implements IView
{

    public static function view(string $viewName = "site", string $action = "index", array $params=[])
    {
        //extract($params, EXTR_SKIP);
        $file = "App/Views/". ucfirst(strtolower($viewName)).'/'.(strtolower($action).".php");
        if(file_exists($file)) require $file;
        else throw new \Exception();
    }
}