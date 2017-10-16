<?php

namespace TestMVC\Core;

use TestMVC;
class View
{

    public static function view(string $viewName, string $action, array $params)
    {
        //extract($params, EXTR_SKIP);
        $file = __DIR__. "App/Views/". ucfirst(strtolower($viewName)).'/'.ucfirst(strtolower($action).".php");
        if(file_exists($file)) require $file;

    }
}