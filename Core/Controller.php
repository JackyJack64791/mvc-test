<?php

namespace TestMVC\Core;

use TestMVC\Core\Interfaces\IController;

class Controller implements IController
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function __call($name, $args)
    {
        $method = $name . 'Action';
        if (method_exists($this, $method))
        {
            call_user_func_array([$this, $method], $args);
        }
        else
        {
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }

}