<?php

namespace App\Service;
use src\Library\Logger\Log4Php;
use src\Library\Logger\ThinkLog;

/**
 * Class AppLogger [工厂模式]
 * @package App\Service
 */
class AppLogger
{
    const TYPE_LOG4PHP = 'Log4php';
    const TYPE_THINKLOG = 'ThinkLog';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        if ($type == self::TYPE_LOG4PHP) {
            include_once __DIR__.'/../Library/Logger/Log4Php.php';
            $this->logger = new Log4Php();
        } elseif ($type == self::TYPE_THINKLOG) {
            include_once __DIR__.'/../Library/Logger/ThinkLog.php';
            $this->logger = new ThinkLog();
        } else {
            throw new \Exception('not found logger');
        }
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