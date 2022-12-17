<?php

namespace Test\App;

use App\App\Demo;
use App\Util\HttpRequest;
use Logger;
use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
    private $logger;
    private HttpRequest $req;

    public function __construct()
    {
        parent::__construct();
        $this->logger = new logger('test');
        $this->req = new HttpRequest();
    }

    public function test_foo()
    {
        $testData = (new Demo($this->logger, $this->req))->foo();
        $this->assertEquals('bar', $testData);
    }

    public function test_get_user_info()
    {
        $testData = (new Demo($this->logger, $this->req))->get_user_info();
        $this->assertEquals(NULL, $testData);
    }
}
