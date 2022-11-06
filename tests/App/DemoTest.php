<?php

namespace Test\App;

use PHPUnit\Framework\TestCase;
use App\App\Demo;
use App\Util\HttpRequest;
use src\Library\Logger\Log4Php;

include_once __DIR__.'/../../src/App/Demo.php';
include_once __DIR__.'/../../src/Library/Logger/Log4Php.php';
include_once __DIR__.'/../../src/Util/HttpRequest.php';


class DemoTest extends TestCase
{

    public function test_foo()
    {
        $logger = new Log4Php();
        $req = new HttpRequest();
        $demo = new Demo($logger,$req);
        $this->assertStringStartsWith("bar", $demo->foo());
    }

    public function test_get_user_info()
    {

        $logger = new Log4Php();
        $req = new HttpRequest();
        $demo = new Demo($logger,$req);
        $demo->get_user_info();

    }
}
