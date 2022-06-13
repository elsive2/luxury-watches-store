<?php

use ishop\Router;

Router::add('/', [
	'controller' => app\controllers\HomeController::class,
	'action' => 'index',
	'method' => 'GET'
]);
Router::add('/product', [
	'controller' => \app\controllers\ProductController::class,
	'action' => 'getByAlias',
	'method' => 'GET'
]);
Router::add('/currency/change', [
	'controller' => app\controllers\CurrencyController::class,
	'action' => 'change',
	'method' => 'GET'
]);

Router::prefix('/admin', function () {
	Router::add('/', [
		'controller' => app\controllers\HomeController::class,
		'action' => 'index',
		'method' => 'GET'
	]);
});
