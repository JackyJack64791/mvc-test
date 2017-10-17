<?php

namespace TestMVC\Core;

use TestMVC\Core\Interfaces\IController;

class Controller implements IController
{
    protected $model;
    protected $view;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->view = new View();
    }


}