<?php

namespace app\controllers;

use app\models\AppModel;
use app\widgets\currency\Currency;
use ishop\App;
use ishop\base\Controller as BaseController;
use ishop\Cache;
use RedBeanPHP\R as R;

class Controller extends BaseController
{
	public function __construct()
	{
		new AppModel;
		App::$app->setProperty('currencies', Currency::getCurrencies());
		App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));
		App::$app->setProperty('cats', self::cacheCategory());
	}

	public static function cacheCategory()
	{
		$cats = Cache::get('cats');
		if (is_null($cats)) {
			$cats = R::findAll('category');
			Cache::set('cats', $cats);
		}
		return $cats;
	}
}
