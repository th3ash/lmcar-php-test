<?php

namespace Library\Logger;

interface LoggerApplicationInterface
{
    /**
     * 日志
     * @param string $message
     * @return mixed
     */
    public function info($message = '');


    /**
     * debug
     * @param string $message
     * @return mixed
     */
    public function debug($message = '');

    /**
     * error
     * @param string $message
     * @return mixed
     */
    public function error($message = '');
}
