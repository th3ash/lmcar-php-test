<?php

namespace Test\Service;

use App\Service\AppLoggerContainer;
use App\Service\AppLoggerFactory;
use App\Service\Log\Log4php;
use App\Service\Log\ThinkLog;
use PHPUnit\Framework\TestCase;
use App\Service\AppLogger;

/**
 * Class ProductHandlerTest
 */
class AppLoggerTest extends TestCase
{
    private $logPath = "";

    private function getFileLastText($fileName) {

        $fileName = $this->logPath . $fileName;

        $this->assertTrue(file_exists($fileName), "项目文件不存在 [".$fileName."]");

        $fileContent = "";

        $fp = fopen($fileName, 'r');
        if ($fp) {
            while(!feof($fp))
            {
                $fileContent =  fgets($fp) ?: $fileContent;
            }
            fclose($fp);
        }
        return $fileContent;
    }

    public function testInfoLog()
    {
        $this->logPath = str_replace('/tests/Service/AppLoggerTest.php', '', str_replace('\\', '/', __FILE__)) . "/logs/" . date("Ym")."/";
        $thinkLogFileName =  date("d") . "_cli.log";
        $log4phpFileName = "log4php_" . date("d") . ".log";

        //工厂模式
        $logger = AppLoggerFactory::create(AppLoggerFactory::TYPE_LOG4PHP);
        $factoryLog4phpMessage = "This is info log message for factory log4php";
        $logger->info($factoryLog4phpMessage);
        $logContent = $this->getFileLastText($log4phpFileName);
        $this->assertNotTrue(strpos($logContent,$factoryLog4phpMessage) === false,'文件内容不匹配');

        $logger = AppLoggerFactory::create(AppLoggerFactory::TYPE_THINK_LOG);
        $factoryThinkLogMessage = "This is info log message for factory thinkLog";
        $logger->info($factoryThinkLogMessage);
        $logContent = $this->getFileLastText($thinkLogFileName);
        $this->assertNotTrue(strpos($logContent,strtoupper($factoryThinkLogMessage)) === false,'文件内容不匹配');

        //策略模式
        $logger = new AppLoggerContainer(new ThinkLog());
        $containerThinkLogMessage = "This is info log message for container thinkLog";
        $logger->info($containerThinkLogMessage);
        $logContent = $this->getFileLastText($thinkLogFileName);
        $this->assertNotTrue(strpos($logContent,strtoupper($containerThinkLogMessage)) === false,'文件内容不匹配');

        $logger = new AppLoggerContainer(new Log4php());
        $containerLog4phpMessage = "This is info log message for container log4php";
        $logger->info($containerLog4phpMessage);
        $logContent = $this->getFileLastText($log4phpFileName);
        $this->assertNotTrue(strpos($logContent,$containerLog4phpMessage) === false,'文件内容不匹配');
    }
}