<?php

use ishop\Router;

Router::add('/', [
	'controller' => app\controllers\HomeController::class,
	'action' => 'index',
	'method' => 'GET'
]);
