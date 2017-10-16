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


}