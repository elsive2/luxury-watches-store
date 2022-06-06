<?php

require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';

$app = new \ishop\App;
debug_array(\ishop\App::$app->getProperties());
