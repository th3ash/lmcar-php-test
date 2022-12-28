<?php
/**
 *
 *
 * @User    : zw
 * @DateTime: 2022/12/26 11:34 下午
 */

namespace App\Service;

/**
 * Log4php装饰器+代理+ 策略模式
 *
 * @Class   Log4phpDecorator
 * @package App\Service
 */
class Log4phpDecorator implements LogInterface
{
    /**
     *
     *
     * @var \Logger
     */
    private $logger;

    /**
     * @constructor Log4phpDecorator.
     *
     * @param  null  $logger 为了方便测试
     */
    public function __construct($logger = null)
    {
        $this->logger = $logger ?? \Logger::getLogger('Log');
    }

    /**
     *
     *
     * @param  string  $message
     */
    public function info($message = '')
    {
        $this->logger->info($message);
    }

    /**
     *
     *
     * @param  string  $message
     */
    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    /**
     *
     *
     * @param  string  $message
     */
    public function error($message = '')
    {
        $this->logger->error($message);
    }
}