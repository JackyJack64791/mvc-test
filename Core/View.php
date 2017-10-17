<?php

namespace TestMVC\Core;

use TestMVC;
use TestMVC\Core\Interfaces\IView;

class View implements IView
{

    public function view(string $viewName, string $action, array $params=[])
    {
        //extract($params, EXTR_SKIP);
        $file = "App/Views/". ucfirst(strtolower($viewName)).'/'.(strtolower($action).".php");
        if(file_exists($file)) require $file;
        else throw new \Exception();
    }
}