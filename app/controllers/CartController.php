<?php

namespace app\controllers;

use app\models\Cart;
use app\services\CartService;

class CartController extends Controller
{
	private $cartService;

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
		$cart = new Cart;
		$cart->addToCart($product, $quantity, $mod);
		if ($this->isAjax()) {
			$this->getViewWithoutLayout('cart');
		}
	}

	public function getCart()
	{
		session_destroy();
		$this->getViewWithoutLayout('cart');
	}
}
