<?php

namespace ishop;

class App
{
	public static Registry $app;

	public function __construct()
	{
		$query = $this->getQueryString();
		session_start();
		self::$app = Registry::instance();
		$this->getParams();
		new ErrorHandler;
		Router::handle($query);
	}

	protected function getParams()
	{
		$params = require_once CONFIG . '/params.php';
		if (!empty($params)) {
			foreach ($params as $key => $value) {
				self::$app->setProperty($key, $value);
			}
		}
	}

	protected function getQueryString()
	{
		$query = trim($_SERVER['REQUEST_URI'], '/');
		return $query === '' ? '/' : $query;
	}
}
