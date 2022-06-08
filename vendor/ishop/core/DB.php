<?php

namespace ishop;

use \RedBeanPHP\R as R;

class DB
{
	use Singletone;

	private function __construct()
	{
		$db = require_once CONFIG . '/db.php';
		R::setup($db['dsn'], $db['user'], $db['password']);

		if (!R::testConnection()) {
			throw new \Exception('There is no connection with DB', 500);
		}
		R::freeze(true);
		if (DEBUG) {
			R::debug(true,);
		}
	}
}
