<?php

namespace app\controllers;

use app\models\User;

class AuthController extends Controller
{
	public function getSignup()
	{
		$this->setMeta('Sign up');
		$this->getView('signup');
	}
	public function signup()
	{
		if (!empty($_POST)) {
			$user = new User;
			$user->load($_POST);
			debug($user->attributes);
		}
	}
	public function getLogin()
	{
	}
	public function login()
	{
	}
}
