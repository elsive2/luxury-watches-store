<?php

namespace app\widgets\menu;

use RedBeanPHP\OODBBean;
use ishop\App;
use ishop\Cache;

class Menu
{
	protected $data;
	protected $tree;
	protected $menuHtml;
	protected $tpl;
	protected $container = 'ul';
	protected $className = 'menu';
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
			$this->tree = $this->getTree();
			$this->menuHtml = $this->getHtmlMenu($this->tree);

			if ($this->cache) {
				Cache::set($this->cacheKey, $this->menuHtml, $this->cache);
			}
		}
		$this->output();
	}

	protected function output()
	{
		$attrs = '';
		if (!empty($this->attrs)) {
			foreach ($this->attrs as $k => $v) {
				$attrs .= " {$k}=\"{$v}\"";
			}
		}
		echo "<{$this->container} class=\"{$this->className}\" {$attrs}";
		echo $this->prepend;
		echo $this->menuHtml;
		echo "</{$this->container}>";
	}

	protected function getTree()
	{
		$tree = [];
		foreach ($this->data as $node) {
			if (!$node['parent_id']) {
				$tree[$node['id']] = $node;
				$tree[$node['id']]->setAttr('childs', []);
			} else {
				$tree[$node['parent_id']]['childs'][$node['id']] = $node;
			}
		}
		return $tree;
	}

	protected function getHtmlMenu($tree, $tab = '')
	{
		$str = '';
		foreach ($tree as $id => $category) {
			$str .= $this->catToTemplate($category, $tab, $id);
		}
		return $str;
	}

	protected function catToTemplate($category, $tab, $id)
	{
		ob_start();
		require $this->tpl;
		return ob_get_clean();
	}
}
