<?php declare(strict_types=1);

namespace TestMVC\Core\Interfaces;


interface ILogger
{
    public function __construct();
    public function __destruct();
    public function log_ok($code);
    public function log_error($errorCode);
    public function log_warning($code);
}