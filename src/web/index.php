<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\PsrHandler;
use Monolog\Logger;
use Rollbar\Rollbar;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '.base.php';

$logger = new Logger($env);
$psrHandler = new PsrHandler(Rollbar::logger());
$psrHandler->setFormatter(new LineFormatter());
$logger->pushHandler($psrHandler);

$logger->notice('なう: ' . $now);

echo '<pre>';
echo $now, PHP_EOL;

var_dump($_GET, $_POST);
echo '</pre>';
