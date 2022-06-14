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

		$this->setMeta($product['title'], $product['desc'], $product['keywords']);
		$this->getView('single', compact(
			'product',
			'related',
			'gallery',
			'recentlyWatched',
			'breadcrumbs'
		));
	}
}
