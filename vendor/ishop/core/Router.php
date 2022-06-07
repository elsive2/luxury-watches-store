<?php

namespace ishop;

use Exception;

class Router
{
	protected static array $routes = [];

	public static function add($regexp, $route = [])
	{
		self::$routes[$regexp] = $route;
	}

	public static function getRoutes(): array
	{
		return self::$routes;
	}

	public static function getRouteByKey($key): array
	{
		return self::$routes[$key];
	}

	public static function handle($current)
	{
		if (array_key_exists($current, self::$routes)) {
			$route = self::getRouteByKey($current);

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
		throw new \Exception('Such a route has not been found!', 404);
	}
}
