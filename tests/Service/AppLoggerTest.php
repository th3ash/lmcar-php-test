<?php

namespace Test\Service;

use App\Service\AppLoggerContainer;
use App\Service\AppLoggerFactory;
use App\Service\Log\ThinkLog;
use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;

/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{

    public function testInfoLog()
    {

        //工厂模式
        $logger = AppLoggerFactory::create(AppLoggerFactory::TYPE_THINK_LOG);
        $logger->info('This is info log message');

        //策略模式
        $logger = new AppLoggerContainer(new ThinkLog());
        $logger->info('This is info log message');
    }
}