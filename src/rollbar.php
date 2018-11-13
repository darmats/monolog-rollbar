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

Rollbar::debug('でばっぐ 1');
Rollbar::log(Level::DEBUG, 'でばっぐ 2');
Rollbar::info('いんふぉ');
Rollbar::notice('のーてぃす');
Rollbar::warning('わーにんぐ');

try {
    throw new Exception('えくせぷしょん');
} catch (Throwable $e) {
    Rollbar::error($e);
}

Rollbar::critical('くりてぃかる');
Rollbar::alert('あらーと');
Rollbar::emergency('えまーじぇんしー');

echo 'done.', PHP_EOL;
