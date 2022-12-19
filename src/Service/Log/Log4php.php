<?php
namespace App\Service\Log;

class Log4php extends LogInterface {

    public function __construct() {
        \Logger::Configure([
            'rootLogger' => [
                'appenders' => ['Log']
            ],
            'appenders' => [
                'Log' => [
                    'class' => 'LoggerAppenderDailyFile',
                    'layout' => [
                        'class' => 'LoggerLayoutPattern',
                        'params' => [
                            'conversionPattern' => '[%date] [%logger][%-5level] %message%newline',
                        ],
                    ],
                    'params' => [
                        'file' => './logs/'.date("Ym").'/log4php_%s.log',
                        'datePattern' => 'd',
                    ]

                ]
            ],
        ]);
        $this->logger =  \Logger::getLogger("Log");
    }

    public function info($message = '')
    {
        $this->logger->info($message);
    }

    public function debug($message = '')
    {
        $this->logger->debug($message);
    }

    public function error($message = '')
    {
        $this->logger->error($message);
    }
}