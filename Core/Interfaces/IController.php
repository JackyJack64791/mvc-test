<?php

namespace TestMVC\Core\Interfaces;


interface IController
{
    public function __construct(IModel $model);
}