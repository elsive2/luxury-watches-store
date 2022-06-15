<?php

namespace app\models;

use ishop\App;

class Cart extends AppModel
{
	public function addToCart($product, $quantity, $mod)
	{
		if (!isset($_SESSION['cart.currency'])) {
			$_SESSION['cart.currency'] = App::$app->getProperty('currency');
		}
		if (!is_null($mod)) {
			$id = "{$product['id']}-{$mod['id']}";
			$title = "{$product['title']} ({$mod['title']})";
			$price = $mod['price'];
		} else {
			$id = $product['id'];
			$title = $product['title'];
			$price = $product['price'];
		}

		if (isset($_SESSION['cart'][$id])) {
			$_SESSION['cart'][$id]['quantity'] += $quantity;
		} else {
			$_SESSION['cart'][$id] = [
				'quantity' => $quantity,
				'title' => $title,
				'price' => $price * $_SESSION['cart.currency']['value'],
				'alias' => $product['alias'],
				'img' => $product['img']
			];
		}
		$_SESSION['cart.quantity'] = isset($_SESSION['cart.quantity']) ? $_SESSION['cart.quantity'] + $quantity : $quantity;
		$_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $quantity * ($price * $_SESSION['cart.currency']['value']) : $quantity * ($price * $_SESSION['cart.currency']['value']);
	}
}
