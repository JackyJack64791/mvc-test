<?php

class AutoloaderNamespaces
{

    private $namespacesMap = array();

    public function add_namespace($namespace, $rootDir) : bool
    {
        if (is_dir($rootDir)) {
            $this->namespacesMap[$namespace] = $rootDir;
            return true;
        }

        return false;
    }

    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    private function autoload($class) : bool
    {
        $pathParts = explode('\\', $class);
        if (is_array($pathParts)) {
            $namespace = array_shift($pathParts);

            if (isset($this->namespacesMap[$namespace])) {
                $filePath = $this->namespacesMap[$namespace] . '/' . implode('/', $pathParts) . '.php';
                require_once $filePath;
                return true;
            }
        }

        return false;
    }

}
