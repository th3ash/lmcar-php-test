<?php
/**
 *
 *
 * @User    : zw
 * @DateTime: 2022/12/26 11:34 下午
 */

namespace App\Service;

use think\facade\Log;

/**
 * Log4php装饰器 + 代理 + 策略模式
 *
 * @Class   Log4phpDecorator
 * @package App\Service
 */
class ThinkLogDecorator implements LogInterface
{
    /**
     *
     *
     * @var Log
     */
    private $logger;

    /**
     * Log4php装饰器 + 策略模式
     *
     * @constructor Log4phpDecorator.
     *
     * @param  null  $logger 为了方便测试
     */
    public function __construct($logger = null)
    {
        //think\LogManager 门面模式
        $this->logger = $logger ?? Log::init(
                [
                    'default'  => 'file',
                    'channels' => [
                        'file' => [
                            'type' => 'file',
                            'path' => './logs/',
                        ],
                    ],
                ]
            );
    }

    /**
     *
     *
     * @param  string  $message
     */
    public function info($message = '')
    {
        $this->logger->info(strtoupper($message));
    }

    /**
     *
     *
     * @param  string  $message
     */
    public function debug($message = '')
    {
        $this->logger->debug(strtoupper($message));
    }

    /**
     *
     *
     * @param  string  $message
     */
    public function error($message = '')
    {
        $this->logger->error(strtoupper($message));
    }
}