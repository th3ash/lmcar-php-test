<?php

namespace Test\Service;

use App\Service\Log4phpDecorator;
use App\Service\ThinkLogDecorator;
use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;

/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{
    /**
     * 测试工厂返回
     */
    public function testInfoLogWhenGetInstance()
    {
        //调用log4php 返回 Log4phpDecorator实例
        $logger = new AppLogger('log4php');
        $this->assertInstanceOf(Log4phpDecorator::class,$logger->getLogger());

        //调用thinklog 返回 ThinkLogDecorator实例
        $logger = new AppLogger('thinklog');
        $this->assertInstanceOf(ThinkLogDecorator::class,$logger->getLogger());
    }

    /**
     * 测试当日志类不存在时
     */
    public function testLogClassIsNotFound()
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionCode(10001);

        new AppLogger('emptyKey');
    }
}