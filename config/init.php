<?php

define('DEBUG', false);
define('ROOT', dirname(__DIR__));
define('WWW', ROOT . '/public');
define('APP', ROOT . '/app');
define('CORE', ROOT . '/vendor/ishop/core');
define('LIBS', ROOT . '/vendor/ishop/core/libs');
define('CACHE', ROOT . '/tmp/cache');
define('CONFIG', ROOT . '/config');
define('LAYOUT', 'default');

$uri = sprintf(
	"%s://%s",
	isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	$_SERVER['SERVER_NAME'],
);

define('BASE_URI', $uri);
define('ADMIN_URI', $uri . '/admin');

require_once ROOT . '/vendor/autoload.php';
