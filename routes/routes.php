<?php

use app\controllers\{
    CartController,
    CurrencyController,
    HomeController,
    ProductController,
    SearchController,
    OrderController
};
use ishop\Router;
use app\middlewares\Auth;

require_once __DIR__ . '/auth.php';

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
