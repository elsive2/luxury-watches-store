<?php

namespace ishop\base;

class Controller
{
	protected array $route;

	protected array $meta;
	protected $data;

	public function __construct(array $route)
	{
		$this->route = $route;
	}

	public function setData($data)
	{
		$this->data = $data;
	}

	public function setMeta($title = '', $desc = '', $keywords = '')
	{
		$this->meta['title']  = $title;
		$this->meta['desc']  = $desc;
		$this->meta['keywords']  = $keywords;
	}
}
