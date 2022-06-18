<?php

namespace app\controllers;

use app\models\Breadcrumb;
use app\models\Product;
use Exception;
use RedBeanPHP\R as R;

class ProductController extends Controller
{
	public function getByAlias()
	{
		if (!isset($_GET['alias'])) {
			throw new Exception('There is no an alias!', 404);
		}

		$product = R::findOne('product', 'alias = ? AND status = \'1\'', [$_GET['alias']]);
		if (!$product) {
			throw new Exception('There is no such a product!', 404);
		}

		$related = R::getAll("SELECT product.* FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?", [$product['id']]);
		$gallery = R::findAll('gallery', 'WHERE product_id = ?', [$product['id']]);

		$model = new Product;
		$model->setRecentlyWatched($product['id']);
		$recentlyWatched = null;

		if ($ids = $model->getRecentlyWatched()) {
			$recentlyWatched = R::find('product', 'id IN (' . R::genSlots($ids) . ') LIMIT 3', $ids);
		}

		$breadcrumbs = Breadcrumb::getBreadcrumbs($product['category_id'], $product['title']);

		$mods = R::findAll('modification', 'product_id = ?', [$product['id']]);

		$this->setMeta($product['title'], $product['desc'], $product['keywords']);
		$this->getView('single', compact(
			'product',
			'related',
			'gallery',
			'recentlyWatched',
			'breadcrumbs',
			'mods'
		));
	}

	public function getProductsByCategory()
	{
		$categoryAlias = $_GET['category'] ?? null;

		if (!is_null($categoryAlias)) {
			$category = R::findOne('category', 'WHERE alias = ?', [$categoryAlias]);
			if ($category['parent_id'] != 0) {
				$categoryIds = [$category['id'], $category['parent_id']];
				$products = R::findAll('product', 'category_id IN (' . R::genSlots($categoryIds) . ') ORDER BY `status` ASC', $categoryIds);
			} else {
				$products = R::getAll('SELECT * FROM product WHERE category_id = ? ORDER BY `status` ASC', [$category['id']]);
			}
			$breadcrumbs = ["Category: $categoryAlias"];
		} else {
			$products = R::findAll('product', 'ORDER BY status ASC');
			$breadcrumbs = ["All products"];
		}

		$this->getView('products', compact('products', 'breadcrumbs'));
	}
}
