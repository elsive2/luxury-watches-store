<?php

namespace app\models;

use ishop\App;

class Breadcrumb
{
	public static function getBreadcrumbs($categoryId, $productTitle)
	{
		$cats = App::$app->getProperty('cats');
		$breadcrumbsArray = self::getParts($cats, $categoryId);
		$breadcrumbs = "<li><a href=\"/\">Home</a></li>";

		foreach ($breadcrumbsArray as $alias => $title) {
			$breadcrumbs .= "<li><a href=\"products?category={$alias}\">{$title}</a></li>";
		}
		$breadcrumbs .= "<li class=\"active\">{$productTitle}</li>";

		return $breadcrumbs;
	}

	protected static function getParts($cats, $categoryId)
	{
		$breadcrumbs = [];
		foreach ($cats as $k => $v) {
			if (isset($cats[$categoryId])) {
				$breadcrumbs[$cats[$categoryId]['alias']] = $cats[$categoryId]['title'];
				$categoryId = $cats[$categoryId]['parent_id'];
			} else break;
		}
		return array_reverse($breadcrumbs);
	}
}
