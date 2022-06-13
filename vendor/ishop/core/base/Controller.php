<?php

namespace ishop\base;

class Controller
{
	protected array $route;

	protected array $meta = [
		'title' => '',
		'desc' => '',
		'keywords' => ''
	];
	public $layout;

	public function __construct(array $route)
	{
		$this->route = $route;
	}

	public function setMeta(string $title, $desc = '', $keywords = '')
	{
		$this->meta['title']  = $title;
		$this->meta['desc']  = $desc;
		$this->meta['keywords']  = $keywords;
	}

	public function getView(string $view, $data = [])
	{
		$layout = isset($this->layout) ? $this->layout : LAYOUT;
		$viewObj = new View($this->route, $this->meta, $view, $layout);
		$viewObj->render($data);
	}
}
