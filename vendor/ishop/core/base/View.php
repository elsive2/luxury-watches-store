<?php

namespace ishop\base;

use Exception;

class View
{
	protected array $route;
	protected array $meta;
	protected mixed $layout;
	protected string $view;

	public function __construct(array $route, array $meta, string $view = '', mixed $layout = '')
	{
		$this->route = $route;
		$this->view = $view;
		$this->meta = $meta;
		$this->layout = $layout;
	}

	public function render($data)
	{
		$viewFile = APP . "/views/{$this->view}.php";
		if (!is_file($viewFile)) {
			throw new Exception("There is no such a {$this->view} view file", 404);
		}

		ob_start();
		require $viewFile;
		$content = ob_get_clean();

		if ($this->layout) {
			echo $layoutFile = APP . "/views/layouts/{$this->layout}.php";

			if (!is_file($layoutFile)) {
				throw new Exception("There is no such a {$this->layoutFile} layout file");
			}
			require $layoutFile;
		}
	}
}
