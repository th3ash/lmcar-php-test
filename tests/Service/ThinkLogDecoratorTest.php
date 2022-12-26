<?php
/**
 *
 *
 * @User    : zw
 * @DateTime: 2022/12/26 11:56 下午
 */

namespace Test\Service;

use App\Service\ThinkLogDecorator;
use PHPUnit\Framework\TestCase;
use think\LogManager;

/**
 * 测试log
 * @Class   ThinkLogDecoratorTest
 * @package App\Service
 */
class ThinkLogDecoratorTest extends TestCase
{

    //验证think Log 一律把日志转为大写 info
    public function testInfo()
    {
        //预期将会传入ABC
        $mockObject        = $this->getMockBuilder(LogManager::class)->getMock( );
        $mockObject->method('info')->with('ABC');

        $thinkLogDecorator = new ThinkLogDecorator($mockObject);
        $thinkLogDecorator->info('abc');
    }

    //验证think Log 一律把日志转为大写
    public function testDebug()
    {
        //预期将会传入ABC
        $mockObject        = $this->getMockBuilder(LogManager::class)->getMock( );
        $mockObject->method('info')->with('ABC');

        $thinkLogDecorator = new ThinkLogDecorator($mockObject);
        $thinkLogDecorator->debug('abc');
    }

    //验证think Log 一律把日志转为大写
    public function testError()
    {
        //预期将会传入ABC
        $mockObject        = $this->getMockBuilder(LogManager::class)->getMock( );
        $mockObject->method('info')->with('ABC');

        $thinkLogDecorator = new ThinkLogDecorator($mockObject);
        $thinkLogDecorator->error('abc');
    }
}
