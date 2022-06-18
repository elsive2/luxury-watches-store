<?php

namespace ishop\base;

use ishop\DB;

abstract class Model
{
	public $attributes = [];
	public $errors = [];
	public $rules = [];

	public function __construct()
	{
		DB::instance();
	}

	public function load($data)
	{
		foreach ($this->attributes as $k => $v) {
			if (isset($data[$k])) {
				$this->attributes[$k] = $data[$k];
			}
		}
	}
}
