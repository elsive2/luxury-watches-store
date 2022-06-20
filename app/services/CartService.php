<?php

namespace app\services;

use Exception;
use RedBeanPHP\R as R;

class CartService
{
	public function getQuantity($quantity): int
    {
		if ($quantity && !empty($quantity)) {
			return $quantity;
		}
		return 1;
	}

	public function getProduct($productId): \RedBeanPHP\OODBBean
    {
		$productId = !empty($productId) ? $productId : null;

		if (is_null($productId)) {
			throw new Exception('The identification of this product is invalid!', 404);
		}
		$product = R::findOne('product', 'id = ?', [$productId]);

		if (!$product) {
			throw new Exception('This product hasn\'t been found!', 404);
		}
		return $product;
	}

	public function getMod($modId, $productId)
	{
		if (empty($modId) || strtolower($modId) == 'default' || is_null($modId)) {
			return null;
		}

		$mod = R::findOne('modification', 'id = ? AND product_id = ?', [$modId, $productId]);
		if (!$mod) {
			throw new Exception('There is no such a modification', 404);
		}
		return $mod;
	}
}
