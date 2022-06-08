<?php

namespace app\controllers;

use ishop\Cache;

final class HomeController extends Controller
{
	public function index()
	{
		$this->setMeta('asdas', 'asdas', 'sddssd');
		$this->getView('index', ['title' => 'SOme title']);
	}
}
