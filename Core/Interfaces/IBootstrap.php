<?php

namespace TestMVC\Core\Interfaces;

use TestMVC\Core\Interfaces\ILogger;


interface IBootstrap
{
    public static function getInstance(): IBootstrap;
    public function init(string $logPath);
    public function configDatabase();
    public function initRouter();
    public function getLogger(): ILogger;
}