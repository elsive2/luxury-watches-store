<?php

namespace app\controllers;

final class HomeController extends Controller
{
	public function index()
	{
		debug_array($this->route);
		$this->setMeta('asdas', 'asdas', ['sd', 'ds', 'sd']);
		$this->getView('index', ['title' => 'SOme title']);
	}
}
