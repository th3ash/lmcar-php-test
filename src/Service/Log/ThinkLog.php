<?php
namespace App\Service\Log;

class ThinkLog extends LogInterface {

    public function __construct() {
        $thinkLog = new \think\LogManager();
        $thinkLog->init([
            'default'	=>	'file',
            'channels'	=>	[
                'file'	=>	[
                    'type'	=>	'file',
                    'path'	=>	'./logs/',
                ],
            ],
        ]);
        $this->logger = $thinkLog;
    }

    private function preMessage($message) {
        return strtoupper($message);;
    }

    public function info($message = '')
    {
        $this->logger->info($this->preMessage($message));
    }

    public function debug($message = '')
    {
        $this->logger->debug($this->preMessage($message));
    }

    public function error($message = '')
    {
        $this->logger->error($this->preMessage($message));
    }
}