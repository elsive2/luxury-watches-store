<?php

namespace ishop\base;

use ishop\DB;
use Valitron\Validator;
use RedBeanPHP\R as R;

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

	public function validate($data)
	{
		$validator = new Validator($data);
		$validator->rules($this->rules);
		if (!$validator->validate()) {
			$this->errors = $validator->errors();
			return false;
		}
		return true;
	}

	public function getErrors()
	{
		$errors = "<ul>";
		foreach ($this->errors as $field) {
			foreach ($field as $error) {
				$errors .= "<li>$error</li>";
			}
		}
		$errors .= "</ul>";
		$_SESSION['errors'] = $errors;
	}

	public function save($table)
	{
		$tbl = R::dispense($table);
		foreach ($this->attributes as $name => $value) {
			$tbl->$name = $value;
		}
		return R::store($tbl);
	}
}
