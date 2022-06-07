<?php

namespace ishop;

use Exception;

class Router
{
	protected static array $routes = [];
	protected static string $prefix = '';

	public static function add($route, $options = [])
	{
		self::$routes[self::$prefix . $route] = $options;
	}

	public static function handle($current)
	{
		if (array_key_exists($current, self::$routes)) {
			$route = self::$routes[$current];

			if ($_SERVER['REQUEST_METHOD'] !== $route['method']) {
				throw new Exception('The route does not have this method', 404);
			}
			$controllerInstance = new $route['controller'];
			if (!method_exists($controllerInstance, $route['action'])) {
				throw new Exception('The controller does not have this action', 404);
			}
			call_user_func([$controllerInstance, $route['action']]);
			return;
		}
		throw new \Exception('Page hasn\'t been found!', 404);
	}

	public static function prefix(string $prefix, $callback)
	{
		self::$prefix = $prefix;
		$callback();
		self::$prefix = '';
	}
}
