<?php

namespace TestMVC\Core;

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

    public function getController(): string
    {
        return $this->controller;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}