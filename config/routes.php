<?php

use app\controllers\{
	AuthController,
	CartController,
	CurrencyController,
	HomeController,
	ProductController,
	SearchController,
    OrderController
};
use ishop\Router;
use app\middlewares\Auth;
use app\middlewares\NoAuth;

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
Router::add('/products', [
	'controller' => ProductController::class,
	'action' => 'getProductsByCategory',
	'method' => 'GET'
]);
Router::add('/search', [
	'controller' => SearchController::class,
	'action' => 'search',
	'method' => 'GET'
]);
// TODO: separate auth routes
Router::add('/signup', [
	'controller' => AuthController::class,
	'action' => 'getSignup',
	'method' => 'GET',
    'middleware' => NoAuth::class
]);
Router::add('/user/signup', [
	'controller' => AuthController::class,
	'action' => 'signup',
	'method' => 'POST',
    'middleware' => NoAuth::class
]);
Router::add('/login', [
	'controller' => AuthController::class,
	'action' => 'getLogin',
	'method' => 'GET',
    'middleware' => NoAuth::class
]);
Router::add('/user/login', [
	'controller' => AuthController::class,
	'action' => 'login',
	'method' => 'POST',
    'middleware' => NoAuth::class
]);
Router::add('/logout', [
	'controller' => AuthController::class,
	'action' => 'logout',
	'method' => 'GET',
    'middleware' => Auth::class
]);
Router::add('/order', [
    'controller' => OrderController::class,
    'action' => 'makeAnOrder',
    'method' => 'GET',
    'middleware' => Auth::class
]);
Router::add('/order/checkout', [
    'controller' => OrderController::class,
    'action' => 'checkout',
    'method' => 'POST',
    'middleware' => Auth::class
]);
Router::prefix('/admin', function () {
	Router::add('/', [
		'controller' => HomeController::class,
		'action' => 'index',
		'method' => 'GET'
	]);
});
