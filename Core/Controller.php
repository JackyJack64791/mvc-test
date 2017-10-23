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
}