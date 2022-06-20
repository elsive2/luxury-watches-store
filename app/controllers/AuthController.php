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
			if ($user->validate($data)) {
				$user->load($_POST);
				$user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
				if ($user->save('user')) {
					$_SESSION['success'] = 'You signed up successfully!';
				} else {
					$_SESSION['errors'] = 'Something went wrong!';
				}
			} else {
				$user->getErrors();
			}
			redirect();
		}
	}
	public function getLogin()
	{
	}
	public function login()
	{
	}
}
