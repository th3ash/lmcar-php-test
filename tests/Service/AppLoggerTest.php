<?php

namespace Test\Service;

use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;

include_once __DIR__.'/../../src/Service/AppLogger.php';
/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{

    public function testInfoLog()
    {
        $logger = new AppLogger('Log4php');
        $logger->info('This is info log message');
        $this->assertNotEmpty('success');
    }
}