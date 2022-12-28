<?php
/**
 *
 *
 * @User    : zw
 * @DateTime: 2022/12/26 11:29 下午
 */

namespace App\Service;


/**
 * 策略模式接口
 *
 * @Interface LogInterface
 * @package   App\Service
 */
interface LogInterface
{
    /**
     *
     *
     * @param  string  $message
     *
     * @return   mixed
     */
    public function info($message = '');

    /**
     *
     *
     * @param  string  $message
     *
     * @return   mixed
     */
    public function debug($message = '');

    /**
     *
     *
     * @param  string  $message
     *
     * @return   mixed
     */
    public function error($message = '');
}