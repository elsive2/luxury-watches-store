<?php

namespace app\widgets\currency;

use RedBeanPHP\R as R;

class Currency
{
	protected $tpl;

	public function __construct()
	{
		$this->tpl = __DIR__ . '/currency_tpl/currency.php';
		$this->run();
	}

	public static function getCurrencies()
	{
		return R::find('currency', 'ORDER BY base DESC');
	}

	public static function getCurrency($currencies)
	{
		return isset($_COOKIE['currency']) && existsInRedbeanObjects($currencies, 'code', $_COOKIE['currency'])
			? R::find('currency', 'WHERE code = ?', [$_COOKIE['currency']])
			: reset($currencies);
	}

	protected function run()
	{
		$this->getHtml();
	}

	protected function getHtml()
	{
	}
}
