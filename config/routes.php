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
Router::add('/cart/add', [
	'controller' => app\controllers\CartController::class,
	'action' => 'add',
	'method' => 'POST'
]);
Router::add('/cart', [
	'controller' => app\controllers\CartController::class,
	'action' => 'getCart',
	'method' => 'GET'
]);
Router::add('/cart/delete', [
	'controller' => app\controllers\CartController::class,
	'action' => 'delete',
	'method' => 'POST'
]);

Router::prefix('/admin', function () {
	Router::add('/', [
		'controller' => app\controllers\HomeController::class,
		'action' => 'index',
		'method' => 'GET'
	]);
});
