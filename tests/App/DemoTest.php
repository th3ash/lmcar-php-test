<?php

namespace Test\App;

use App\App\Demo;
use App\Service\AppLogger;
use App\Util\HttpRequest;
use PHPUnit\Framework\TestCase;


class DemoTest extends TestCase
{

    public function test_foo()
    {
        $logger = new AppLogger('log4php');

        $userService = new Demo($logger, new HttpRequest());
        $foo = $userService->foo();

        $this->assertNotEmpty($foo,"foo 返回数据为空");
    }

    public function testGetUserInfo()
    {
        $logger = new AppLogger('log4php');

        try {
            $userService = new Demo($logger, new HttpRequest());
            $userInfo = $userService->get_user_info();
        } catch (\Exception $e) {
            $this->assertNotTrue(true,"GetUserInfo 调用方法异常".$e->getMessage());
        }

        $this->assertNotEmpty($userInfo,"GetUserInfo 返回数据为空");

        $this->assertArrayHasKey('id',$userInfo, "GetUserInfo 未找到ID字段");
        $this->assertArrayHasKey('username',$userInfo,"GetUserInfo 未找到username字段");
    }
}
