<?php
/**
 *
 *
 * @User    : zw
 * @DateTime: 2022/12/26 11:56 下午
 */

namespace Test\Service;

use App\Service\Log4phpDecorator;
use App\Service\ThinkLogDecorator;
use PHPUnit\Framework\TestCase;
use think\LogManager;

/**
 * 测试log
 * @Class   Log4phpDecoratorTest
 * @package App\Service
 */
class Log4phpDecoratorTest extends TestCase
{

    //验证 log 4一律把日志转为大写 info
    public function testInfo()
    {
        //预期将会传入ABC
        $mockObject        = $this->getMockBuilder(LogManager::class)->getMock();
        $mockObject->expects($this->once())->method('info')->with($this->equalTo('abc'));

        $thinkLogDecorator = new Log4phpDecorator($mockObject);
        $thinkLogDecorator->info('abc');
    }

    //验证log 4 一律把日志转为大写
    public function testDebug()
    {
        //预期将会传入ABC
        $mockObject        = $this->getMockBuilder(LogManager::class)->getMock();
        $mockObject->expects($this->once())->method('debug')->with($this->equalTo('abc'));

        $thinkLogDecorator = new Log4phpDecorator($mockObject);
        $thinkLogDecorator->debug('abc');
    }

    //验证log 4 一律把日志转为大写
    public function testError()
    {
        //预期将会传入ABC
        $mockObject        = $this->getMockBuilder(LogManager::class)->getMock();
        $mockObject->expects($this->once())->method('error')->with($this->equalTo('abc'));

        $thinkLogDecorator = new Log4phpDecorator($mockObject);
        $thinkLogDecorator->error('abc');
    }
}
