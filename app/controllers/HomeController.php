<?php

namespace app\controllers;

final class HomeController extends Controller
{
	public function index()
	{
		$this->setMeta(
			'Luxury Watches A Ecommerce Category Flat Bootstrap Resposive Website Template | Home :: w3layouts',
			'',
			'Luxury Watches Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design',
		);
		$this->getView('index');
	}
}
