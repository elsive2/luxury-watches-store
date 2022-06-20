<?php

namespace app\controllers;

use RedBeanPHP\R as R;

final class HomeController extends Controller
{
	public function index()
	{
		$brands = R::find('brand', 'LIMIT 3');
		$products = R::find('product', "hit = '1' AND status = '1' LIMIT 8");

		$this->setMeta('Luxury Watches A Ecommerce Category Flat Bootstrap Responsive Website Template | Home :: w3layouts', '', 'Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyErricsson, Motorola web design');
		$this->getView('index', compact('brands', 'products'));
	}
}
