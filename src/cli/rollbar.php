<?php

use Rollbar\Payload\Level;
use Rollbar\Rollbar;

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . '.base.php';

//Rollbar::debug('でばっぐ 1');
//Rollbar::log(Level::DEBUG, 'でばっぐ 2');
//Rollbar::info('いんふぉ');
//Rollbar::notice('のーてぃす');
//Rollbar::warning('わーにんぐ');
//
//try {
//    throw new Exception('えくせぷしょん');
//} catch (Throwable $e) {
//    Rollbar::error($e);
//}
//
//Rollbar::critical('くりてぃかる');
//Rollbar::alert('あらーと');
//Rollbar::emergency('えまーじぇんしー');

Rollbar::log(Level::DEBUG, 'なう: ' . $now);

echo $now, PHP_EOL;
