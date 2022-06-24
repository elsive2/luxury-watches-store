<?php

use ishop\Router;
use app\controllers\AuthController;
use app\middlewares\NoAuth;
use app\middlewares\Auth;

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