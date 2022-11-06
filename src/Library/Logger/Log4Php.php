<?php

namespace src\Library\Logger;

use Library\Logger\LoggerApplicationInterface;

include_once __DIR__.'/LoggerApplicationInterface.php';

/**
 *
 */
class Log4Php implements LoggerApplicationInterface
{
    protected $logger=null;

    public function __construct()
    {
        \Logger::configure();
        $this->logger = \Logger::getLogger('log');
    }

    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}
