<?php

namespace App\Service;

use App\Service\Log\LogInterface;

class AppLoggerContainer
{
    private $logger;

    public function __construct(LogInterface $logger)
    {
        $this->logger = $logger;
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
