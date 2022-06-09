<?php

namespace app\controllers;

use RedBeanPHP\R as R;

class CurrencyController extends Controller
{
	public function change()
	{
		$currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
		if (!is_null($currency)) {
			$curr = R::findOne('currency', 'code = ?', [$currency]);
			if (!$curr->isEmpty()) {
				setcookie('currency', $currency, time() + 3600 * 24 * 7, '/');
			}
		}
		redirect();
	}
}
