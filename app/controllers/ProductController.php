<?php

namespace app\controllers;

use Exception;
use RedBeanPHP\R as R;

class ProductController extends Controller
{
	public function getByAlias()
	{
		if (!isset($_GET['alias'])) {
			throw new Exception('There is no an alias!', 404);
		}

		$product = R::findOne('product', 'alias = ? AND status = \'1\'', [$_GET['alias']]);
		if (!$product) {
			throw new Exception('There is no such a product!', 404);
		}

		$this->setMeta($product['title'], $product['desc'], $product['keywords']);
		$this->getView('single', compact('product'));
	}
}
