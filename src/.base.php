<?php

use Rollbar\Rollbar;

define('DS', DIRECTORY_SEPARATOR);
require_once dirname(__DIR__) . DS . 'vendor' . DS . 'autoload.php';
ini_set('date.timezone', 'Asia/Tokyo');

$token = getenv('ROLLBAR_ACCESS_TOKEN');
if ($token === false) {
    echo '"ROLLBAR_ACCESS_TOKEN" is not set.', PHP_EOL;
    exit(1);
}
$env = getenv('APP_ENV') ?: 'local';

Rollbar::init([
    'access_token' => $token,
    'environment' => $env,
]);

$now = (new DateTime())->format('Y-m-d H:i:s');
