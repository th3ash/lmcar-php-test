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
        $this->assertInstanceOf(Log4phpDecorator::class, $logger->getLogger());

        //调用thinklog 返回 ThinkLogDecorator实例
        $logger = new AppLogger('thinklog');
        $this->assertInstanceOf(ThinkLogDecorator::class, $logger->getLogger());
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

    /**
     * 测试info
     */
    public function testInfo()
    {
        //mock预期
        $log4PhpDecorator = $this->getMockBuilder(Log4phpDecorator::class)->getMock();
        $log4PhpDecorator->expects($this->once())->method('info')->with($this->equalTo( 'info'));

        //执行
        $logger = new AppLogger($log4PhpDecorator);
        $logger->info('info');
    }

    /**
     * 测试error
     */
    public function testError()
    {
        //mock预期
        $log4PhpDecorator = $this->getMockBuilder(Log4phpDecorator::class)->getMock();
        $log4PhpDecorator->expects($this->once())->method('error')->with($this->equalTo( 'error'));

        //执行
        $logger = new AppLogger($log4PhpDecorator);
        $logger->error('error');
    }

    /**
     * 测试debug
     */
    public function testDebug()
    {
        //mock预期
        $log4PhpDecorator = $this->getMockBuilder(Log4phpDecorator::class)->getMock();
        $log4PhpDecorator->expects($this->once())->method('debug')->with($this->equalTo( 'debug'));

        //执行
        $logger = new AppLogger($log4PhpDecorator);
        $logger->debug('debug');
    }

}