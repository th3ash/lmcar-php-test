<?php

namespace App\Service;

use think\LogManager as thinkLog;

class AppLogger
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINK_LOG = 'think-log';

    private $logger;

    public function __construct($type = self::TYPE_LOG4PHP)
    {
        # 策略模式
        if ($type == self::TYPE_LOG4PHP) {
            $this->logger = \Logger::getLogger("Log");
        }
        if ($type == self::TYPE_THINK_LOG) {
            $this->logger = (new thinkLog());
        }
    }

    public function info($message = '')
    {
        $message = $this->upperMessage($message);
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $message = $this->upperMessage($message);
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $message = $this->upperMessage($message);
        $this->logger->error($message);
    }

    private function upperMessage($message)
    {
        switch ($this->logger) {
            # 判断当前logger属于哪个类,如果是thinklog就大写
            case $this->logger instanceof thinkLog:
                $message = strtoupper($message);
                break;
            case $this->logger instanceof \Logger:
                break;
        }
        return $message;
    }
}
