<?php

namespace app\widgets\menu;

use ishop\App;
use ishop\Cache;

class Menu
{
	protected $data;
	protected $tree;
	protected $menuHtml;
	protected $tpl;
	protected $container = 'ul';
	protected $table = 'category';
	protected $cache = 3600;
	protected $cacheKey = 'luxury-watches-menu';
	protected $attrs = [];
	protected $prepend = '';

	public function __construct($options = [])
	{
		$this->tpl = __DIR__ . '/menu_tpl/menu.php';
		$this->setOptions($options);
		$this->run();
	}

	protected function setOptions($options)
	{
		foreach ($options as $k => $v) {
			if (\property_exists($this, $k)) {
				$this->$k = $v;
			}
		}
	}

	protected function run()
	{
		$this->menuHtml = Cache::get($this->cacheKey);
		if (is_null($this->menuHtml)) {
			$this->data = App::$app->getProperty('cats');
		} else {
			echo $this->menuHtml;
		}
	}

	protected function getTree()
	{
	}

	protected function getHtmlMenu($tree, $tab = '')
	{
	}

	protected function catToTemplate($cat, $tab, $id)
	{
	}
}
