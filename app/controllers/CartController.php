<?php

namespace app\controllers;

use app\models\Cart;
use app\services\CartService;

class CartController extends Controller
{
	private CartService $cartService;

    public function __construct()
	{
		parent::__construct();
		$this->cartService = new CartService;
	}

	public function add()
	{
		$product = $this->cartService->getProduct($_REQUEST['id']);
		$quantity = $this->cartService->getQuantity($_REQUEST['quantity']);
		$mod = $this->cartService->getMod($_REQUEST['mod'] ?? null, $_REQUEST['id']);
		Cart::addToCart($product, $quantity, $mod);
		if ($this->isAjax()) {
		    $this->getCart();
		}
	}

	public function getCart()
	{
		$this->getViewWithoutLayout('cart');
	}

	public function delete()
	{
		if (isset($_SESSION['cart'][$_REQUEST['id']])) {
			Cart::deleteItem($_REQUEST['id']);
		}
		if ($this->isAjax()) {
			$this->getCart();
		}
	}

	public function clear()
	{
		Cart::clear();
		if ($this->isAjax()) {
			$this->getCart();
		}
	}
}
