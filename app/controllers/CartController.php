<?php

namespace app\controllers;

use app\services\CartService;
use Exception;

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
		$id = $this->cartService->getProduct($_REQUEST['id']);
		$quantity = $this->cartService->getQuantity($_REQUEST['quantity']);
		$modId = $this->cartService->getMod($_REQUEST['mod'], $_REQUEST['id']);

		debug($id, $quantity, $modId);

		die();
	}
}
