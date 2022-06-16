<?php

use app\controllers\{
	CartController,
	CurrencyController,
	HomeController,
	ProductController
};
use ishop\Router;

Router::add('/', [
	'controller' => HomeController::class,
	'action' => 'index',
	'method' => 'GET'
]);
Router::add('/product', [
	'controller' => ProductController::class,
	'action' => 'getByAlias',
	'method' => 'GET'
]);
Router::add('/currency/change', [
	'controller' => CurrencyController::class,
	'action' => 'change',
	'method' => 'GET'
]);
Router::add('/cart/add', [
	'controller' => CartController::class,
	'action' => 'add',
	'method' => 'POST'
]);
Router::add('/cart', [
	'controller' => CartController::class,
	'action' => 'getCart',
	'method' => 'GET'
]);
Router::add('/cart/delete', [
	'controller' => CartController::class,
	'action' => 'delete',
	'method' => 'POST'
]);
Router::add('/cart/clear', [
	'controller' => CartController::class,
	'action' => 'clear',
	'method' => 'POST'
]);

Router::prefix('/admin', function () {
	Router::add('/', [
		'controller' => HomeController::class,
		'action' => 'index',
		'method' => 'GET'
	]);
});
