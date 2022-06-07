<?php

namespace ishop\base;

class View
{
	protected array $route;
	protected array $meta;
	protected $layout;
	protected string $view;

	public function __construct(array $route, array $meta, string $layout = '', string $view = '')
	{
		$this->route = $route;
		$this->view = $view;
		$this->meta = $meta;

		if ($layout) {
			$this->layout = false;
		} else {
			$this->layout = $layout ?: LAYOUT;
		}
	}
}
