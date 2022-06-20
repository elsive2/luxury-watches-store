<?php

namespace app\models;

use RedBeanPHP\R as R;

class User extends AppModel
{
	public $attributes = [
		'login' 	=> '',
		'password' 	=> '',
		'name' 		=> '',
		'email' 	=> '',
		'address' 	=> '',
		'role' 		=> 'user'
	];

	public $rules = [
		'required' => ['login', 'password', 'email', 'address', 'name'],
		'email' => ['email'],
		'lengthMin' => [
			['password', '8']
		]
	];

	public function checkUnique()
	{
		$user = R::findOne('user', 'login = ? OR email = ?', [$this->attributes['login'], $this->attributes['email']]);
		if ($user) {
			if ($user['login'] == $this->attributes['login']) {
				$this->errors['login']['unique'] = 'This login is already engaged!';
			}
			if ($user['email'] == $this->attributes['email']) {
				$this->errors['email']['unique'] = 'This email is already engaged!';
			}
			return false;
		}
		return true;
	}
}
