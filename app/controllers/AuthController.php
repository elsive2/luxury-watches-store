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
			$user->load($_POST);
			if ($user->checkUnique() && $user->validate($data)) {
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
		$this->setMeta('log in');
		$this->getView('login');
	}
	public function login()
	{
		$login = trim($_POST['login']) ?? null;
		$password = trim($_POST['password']) ?? null;

		$user = new User;
		if ($user->login($login, $password)) {
			$_SESSION['success'] = 'You logged in successfully!';
		} else {
			$_SESSION['errors'] = 'Wrong creds!';
		}
		redirect();
	}

	public function logout()
	{
		if (isset($_SESSION['user'])) {
			unset($_SESSION['user']);
			$_SESSION['success'] = 'You logged out successfully!';
		}
		redirect('/login');
	}
}
