<?php

namespace ishop;

class App
{
	public static Registry $app;

	public function __construct()
	{

		$query = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
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
}
