<?php

class Route
{
    protected $controller;
    protected $action;
    protected $params;

    public function __construct(string $controller, string $action, array $params=[])
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->params = $params;
    }
}