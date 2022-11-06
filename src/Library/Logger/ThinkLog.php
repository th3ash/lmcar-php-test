<?php

namespace src\Library\Logger;

use Library\Logger\LoggerApplicationInterface;
use think\facade\Log;

include_once __DIR__.'/LoggerApplicationInterface.php';
/**
 * think-log
 */
class ThinkLog implements LoggerApplicationInterface
{

    public function __construct()
    {
        Log::init([
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	'./logs/',
                ],
            ],
        ]);
    }

    public function info($message = '')
    {
        Log::info(strtoupper($message));
        Log::save();
    }

    public function debug($message = '')
    {
        Log::debug(strtoupper($message));
        Log::save();
    }

    public function error($message = '')
    {
        Log::error(strtoupper($message));
        Log::save();
    }
}
