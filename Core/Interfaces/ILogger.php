<?php declare(strict_types=1);

namespace TestMVC\Core\Interfaces;


interface ILogger
{
    public function __construct();
    public function __destruct();
    public function logOk($code);
    public function logError($errorCode);
    public function logWarning($code);
}