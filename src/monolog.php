<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\PsrHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Rollbar\Rollbar;

define('DS', DIRECTORY_SEPARATOR);
require_once dirname(__DIR__) . DS . 'vendor' . DS . 'autoload.php';
ini_set('date.timezone', 'Asia/Tokyo');

$token = getenv('ROLLBAR_ACCESS_TOKEN');
if ($token === false) {
    echo '"ROLLBAR_ACCESS_TOKEN" is not set.', PHP_EOL;
    exit(1);
}

$env = getenv('APP_ENV');
if ($env === false) {
    $env = 'local';
}

Rollbar::init([
    'access_token' => $token,
    'environment' => $env,
]);

$logger = new Logger($env);
$psrHandler = new PsrHandler(Rollbar::logger());
$psrHandler->setFormatter(new LineFormatter());
$logger->pushHandler($psrHandler);
$logger->pushHandler(new StreamHandler('php://stdout'));

$logger->debug('でばっぐ');
$logger->info('いんふぉ');
try {
    throw new Exception('えくせぷしょん');
} catch (Throwable $e) {
    $logger->error($e);
}
$logger->critical('くりてぃかる');

echo 'done.', PHP_EOL;
