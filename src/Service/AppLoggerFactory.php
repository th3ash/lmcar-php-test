<?php

namespace App\Service;

use App\Service\Log\Log4php;
use App\Service\Log\ThinkLog;

class AppLoggerFactory
{
    const TYPE_LOG4PHP = 'log4php';
    const TYPE_THINK_LOG = 'think-log';

    public static function create($type = self::TYPE_LOG4PHP) {
        switch ($type) {
            case self::TYPE_LOG4PHP :
                return new Log4php();
            case self::TYPE_THINK_LOG :
                return new ThinkLog();
            default :
                return null;
        }
    }
}