<?php

namespace app\models;

use ishop\App;

class Cart extends AppModel
{
	public static function addToCart($product, $quantity, $mod)
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
		$_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] * $_SESSION['cart.currency']['value'] + ($quantity * ($price * $_SESSION['cart.currency']['value'])) : $quantity * ($price * $_SESSION['cart.currency']['value']);
	}

	public static function deleteItem($id)
	{
		// TODO: can delete only one product (also can add one product in the cart)

		$quantityMinus = $_SESSION['cart'][$id]['quantity'];
		$sumMinus = $_SESSION['cart'][$id]['quantity'] * ($_SESSION['cart'][$id]['price'] * $_SESSION['cart.currency']['value']);
		$_SESSION['cart.quantity'] -= $quantityMinus;
		$_SESSION['cart.sum'] -= $sumMinus;
		unset($_SESSION['cart'][$id]);
	}

	public static function clear()
	{
		$_SESSION['cart'] = [];
		unset($_SESSION['cart.quantity']);
		unset($_SESSION['cart.sum']);
	}

	public static function recalculate($curr)
	{
		// TODO: calculate total sum correctly

		if (isset($_SESSION['cart.currency'])) {
			if ($_SESSION['cart.currency']['base']) {
				$_SESSION['cart.sum'] *= $curr['value'];
			} else {
				$_SESSION['cart.sum'] = $_SESSION['cart.sum'] / $_SESSION['cart.currency']['value'] * $curr['value'];
			}
			foreach ($_SESSION['cart'] as $id => $product) {
				if ($_SESSION['cart.currency']['base']) {
					$_SESSION['cart'][$id]['price'] *= $curr['value'];
				} else {
					$_SESSION['cart'][$id]['price'] = ($product['price'] / $_SESSION['cart.currency']['value']) * $curr['value'];
				}
			}
			foreach ($curr as $k => $v) {
				$_SESSION['cart.currency'][$k] = $v;
			}
		}
	}
}
