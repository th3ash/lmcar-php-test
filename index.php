<?
define('APP_PATH',__DIR__);
include APP_PATH.'/src/Service/AppLogger.php';
include APP_PATH.'/vendor/autoload.php';
$logos = new \App\Service\AppLogger('ThinkLog');
$logos->info('nihao');