<?php

namespace app\controllers;

use Exception;
use RedBeanPHP\R as R;

class SearchController extends Controller
{
	public function search()
	{
		$q = $_GET['q'] ?? null;
		if (is_null($q)) {
			throw new Exception('There is no `q` param!', 404);
		}

		$products = R::getAll('SELECT * FROM product WHERE title LIKE ?', ["%$q%"]);
		$breadcrumbs = ["Searching for: {$_GET['q']}"];

		$this->getView('products', compact('products', 'breadcrumbs'));
	}
}
