<?php

namespace app\widgets\menu;

use ishop\App;
use ishop\Cache;

class Menu
{
	const CACHE_KEY = 'luxury-watches-menu';
	const CACHE_TIME = 3600;

	public static function run()
	{
		$menu = Cache::get(self::CACHE_KEY);
		if (is_null($menu)) {
			$menu = self::getMenu(App::$app->getProperty('cats'));
			Cache::set(self::CACHE_KEY, $menu, self::CACHE_TIME);
		}
		return $menu;
	}

	protected static function getMenu($data)
	{
		$tree = [];
		foreach ($data as $node) {
			if (!$node['parent_id']) {
				$tree[$node['id']] = $node;
				$tree[$node['id']]->setAttr('childs', []);
			} else {
				$tree[$node['parent_id']]['childs'][$node['id']] = $node;
			}
		}
		return $tree;
	}
}
