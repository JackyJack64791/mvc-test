<?php
spl_autoload_extensions(".php");
spl_autoload_register();
//
//class Autoloader
//{
//
//    protected $namespacesMap = array();
//
//    public function addNamespace($namespace, $rootDir)
//    {
//        if (is_dir($rootDir)) {
//            $this->namespacesMap[$namespace] = $rootDir;
//            return true;
//        }
//
//        return false;
//    }
//
//    public function register()
//    {
//        print_r($this->namespacesMap);
//        spl_autoload_register(array($this, 'autoload'));
//    }
//
//    protected function autoload($class)
//    {
//        print $class."\n";
//        $pathParts = explode('\\', $class);
//        print_r($pathParts);
//        if (is_array($pathParts)) {
//            $namespace = array_shift($pathParts);
//
//            if (!empty($this->namespacesMap[$namespace])) {
//                $filePath = $this->namespacesMap[$namespace] . '/' . implode('/', $pathParts) . '.php';
//
//                require_once $filePath;
//                return true;
//            }
//        }
//
//        return false;
//    }
//
//}
