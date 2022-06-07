<?php

use ishop\Router;

Router::add('/', [
	'controller' => app\controllers\HomeController::class,
	'action' => 'index',
	'method' => 'GET'
]);
Router::prefix('/admin', function () {
	Router::add('/', [
		'controller' => app\controllers\HomeController::class,
		'action' => 'index',
		'method' => 'GET'
	]);
});
