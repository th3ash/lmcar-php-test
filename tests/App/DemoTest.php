<?php

namespace Test\App;

use App\App\Demo;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase
{

    //测试foo
    public function test_foo()
    {
        $demo = new Demo('', $this->createMock(HttpRequest::class));
        $this->assertEquals('bar',$demo->foo());
    }


    public function test_get_user_info()
    {
        //region 当请求成功时

        //准备数据
        $successResultJson = '{"error":0,"data":{"id":1,"username":"hello world"}}';

        //预期
        $mockBuilder = $this->getMockBuilder(HttpRequest::class)->getMock();
        $mockBuilder->method('get')->with(Demo::URL)->willReturn($successResultJson);

        //执行
        $demo = new Demo('', $mockBuilder);
        $userInfo = $demo->get_user_info();
        $this->assertEquals(1, $userInfo['id']);
        //endregion

        //region 当请求成功时

        //mock 请求失败的类型, 进行测试....

        //endregion

    }
}
