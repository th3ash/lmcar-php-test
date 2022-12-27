<?php

namespace App\Service;

/**
 * 用作工厂类
 * @Class   AppLogger
 * @package App\Service
 */
class AppLogger implements LogInterface
{
    //log4php
    public const TYPELOG4PHP = 'log4php';

    //thinklog
    public const TYPETHINKLOGPHP = 'thinklog';

    //设置日志工厂信息
    public $logFactoryList = [
        self::TYPELOG4PHP     => Log4phpDecorator::class,
        self::TYPETHINKLOGPHP => ThinkLogDecorator::class,
    ];

    /**
     *
     *
     * @var LogInterface
     */
    private $logger;

    /**
     * @constructor AppLogger.
     *
     * @param  null  $type
     */
    public function __construct($type = null)
    {
        $this->logger = new $this->logFactoryList[$type]();
    }

    /**
     *
     *
     * @param  string  $message
     *
     * @return   mixed|void
     */
    public function info($message = '')
    {
        $this->logger->info($message);
    }

    /**
     *
     *
     * @param  string  $message
     *
     * @return   mixed|void
     */
    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    /**
     *
     *
     * @param  string  $message
     *
     * @return   mixed|void
     */
    public function error($message = '')
    {
        $this->logger->error($message);
    }

    /**
     * @return LogInterface
     */
    public function getLogger(): LogInterface
    {
        return $this->logger;
    }
}