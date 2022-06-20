<?php

namespace app\models;

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
}
