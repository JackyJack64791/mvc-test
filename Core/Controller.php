<?php

namespace TestMVC\Core;

use TestMVC\Core\Interfaces\IController;
use TestMVC\Core\Interfaces\IModel;

class Controller implements IController
{
    protected $model;

    public function __construct(IModel $model)
    {
        $this->model = $model;
    }

    public function __call(string $name, array $args)
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