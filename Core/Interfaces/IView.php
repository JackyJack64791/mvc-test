<?php

namespace TestMVC\Core\Interfaces;


interface IView
{
    public static function view(string $viewName, string $action, array $params=[], string $parentView);
}