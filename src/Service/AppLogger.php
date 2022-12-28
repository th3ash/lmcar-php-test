<?php

namespace App\Service;

/**
 * 用作工厂类
 *
 * @Class   AppLogger
 * @package App\Service
 */
class AppLogger implements LogInterface
{
    //log4php
    private const TYPELOG4PHP = 'log4php';

    //thinklog
    private const TYPETHINKLOGPHP = 'thinklog';

    //设置日志工厂信息
    private $logFactoryList = [
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
     * @param  null  $logTypeOrInstance
     */
    public function __construct($logTypeOrInstance = null)
    {
        $this->logger = $logTypeOrInstance instanceof LogInterface ? $logTypeOrInstance : $this->loadingLog((string)$logTypeOrInstance);
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

    /**
     * 加载日志类实例
     *
     * @param  string|null  $logTypeOrInstance
     *
     * @return   mixed
     */
    private function loadingLog(string $logTypeOrInstance = null): LogInterface
    {
        if (array_key_exists($logTypeOrInstance,$this->logFactoryList)) {
            return new $this->logFactoryList[$logTypeOrInstance]();
        }

        throw new \LogicException('not found log class',10001);
    }
}