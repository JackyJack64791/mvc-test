<?php

namespace TestMVC\Core;

use http\Exception\BadUrlException;
use TestMVC;
use TestMVC\Core\Interfaces\IView;

class View implements IView
{


    public static function view(string $viewName = "site", string $action = "index", array $params=[],string $parentView = __DIR__."/../App/Views/layout.php")
    {
        extract($params, EXTR_SKIP);
        $file = "App/Views/". ucfirst(strtolower($viewName)).'/'.(strtolower($action).".php");
        if(file_exists($file))
        {
            ob_start();
            require $file;
            $content = ob_get_clean();
            require $parentView;
        }
        else throw new BadUrlException();
    }
}