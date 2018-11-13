<?php

use Rollbar\Payload\Level;
use Rollbar\Rollbar;

define('DS', DIRECTORY_SEPARATOR);

require_once dirname(__DIR__) . DS . 'vendor' . DS . 'autoload.php';

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

Rollbar::log(Level::ERROR, 'Test error message');

//Rollbar::debug('debug 1');
//Rollbar::log(Level::DEBUG, 'debug 2');
//Rollbar::info('info');
//Rollbar::notice('notice');
//Rollbar::warning('warning');
//
//try {
//    throw new Exception('exception message');
//} catch (Throwable $e) {
//    Rollbar::error($e);
//}
//
//Rollbar::critical('critical');
//Rollbar::alert('alert');
//Rollbar::emergency('emergency');

echo 'done.', PHP_EOL;
