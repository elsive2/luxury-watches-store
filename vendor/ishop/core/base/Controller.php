<?php

namespace ishop\base;

class Controller
{
	protected array $meta = [
		'title' => '',
		'desc' => '',
		'keywords' => ''
	];
	public $layout;

	public function setMeta(string $title, $desc = '', $keywords = '')
	{
		$this->meta['title']  = $title;
		$this->meta['desc']  = $desc;
		$this->meta['keywords']  = $keywords;
	}

	public function getView(string $view, $data = [])
	{
		$layout = isset($this->layout) ? $this->layout : LAYOUT;
		$viewObj = new View($this->meta, $view, $layout);
		$viewObj->render($data);
	}
}
