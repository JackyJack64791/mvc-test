<?php

namespace TestMVC\Core;

use TestMVC\Core\Interfaces\IRegistry;

class Registry implements IRegistry
{
    protected $vars = [];
    public function __construct(array $vars=[])
    {
        $this->vars = $vars;
    }
    public function __get($key)
    {
        return isset($this->vars[$key]) ? $this->vars[$key] : null;
    }
    public function __set($key, $value)
    {
        if(!isset($this->vars[$key]))
        {
            $this->vars[$key] = $value;
        }
        else
        {
            $this->vars['logger']->log_error(80);
        }

    }
}