<?php

namespace TestMVC\Core\Interfaces;


interface ILogger
{
    public function __construct(string $logPath);
    public function __destruct();
    public function logOk($code);
    public function logError($code);
    public function logWarning($code);
}