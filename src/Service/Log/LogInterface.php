<?php
namespace App\Service\Log;

abstract class LogInterface {

    protected $logger;

    abstract function info();

    abstract function debug();

    abstract function error();
}