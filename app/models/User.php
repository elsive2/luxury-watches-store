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

	public function login($login, $password, $isAdmin = false)
	{
		if (!is_null($login) || !is_null($password)) {
			$user = null;
			if ($isAdmin) {
				$user = R::findOne('user', 'login = ? AND role = \'admin\'', [$login]);
			} else {
				$user = R::findOne('user', 'login = ?', [$login]);
			}
			if (!is_null($user)) {
				if (\password_verify($password, $user['password'])) {
					foreach ($user as $k => $v) {
						if ($k == 'password') {
							continue;
						}
						$_SESSION['user'][$k] = $v;
					}
					return true;
				}
			}
			return false;
		}
	}
}
