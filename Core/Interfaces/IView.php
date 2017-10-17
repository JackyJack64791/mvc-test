<?php

namespace TestMVC\Core\Interfaces;


interface IView
{
    public function view(string $viewName, string $action, array $params=[]);
}