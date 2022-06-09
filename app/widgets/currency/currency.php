<?php

namespace app\widgets\currency;

use ishop\App;
use RedBeanPHP\R as R;

class Currency
{
	public static function getCurrencies()
	{
		return R::find('currency', 'ORDER BY base DESC');
	}

	public static function getCurrency($currencies)
	{
		return isset($_COOKIE['currency']) && existsInRedbeanObjects($currencies, 'code', $_COOKIE['currency'])
			? R::findOne('currency', 'WHERE code = ?', [$_COOKIE['currency']])
			: array_values($currencies)[0];
	}

	public static function run()
	{
		$currencies = App::$app->getProperty('currencies');
		$currency = App::$app->getProperty('currency');

		ob_start();
		require __DIR__ . '/currency_tpl/currency.php';
		echo \ob_get_clean();
	}
}
