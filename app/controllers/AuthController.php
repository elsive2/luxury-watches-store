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
		$data = $_POST;
		if (!empty($data)) {
			$user = new User;
			if (!$user->validate($data)) {
				$user->getErrors();
				redirect();
			} else {
				$user->load($_POST);
				debug($user->attributes);
				$_SESSION['success'] = 'OK';
				redirect();
			}
		}
	}
	public function getLogin()
	{
	}
	public function login()
	{
	}
}
