<?php

namespace app\models;

class Product extends AppModel
{
	const COOKIE_KEY = 'recentlyWatched';
	const COOKIE_TIME = 3600 * 12;

	public function setRecentlyWatched($id)
	{
		$recentlyWatched = $this->getAllRecentlyWatched();
		if (!$recentlyWatched) {
			setcookie(self::COOKIE_KEY, $id, time() + self::COOKIE_TIME, '/');
		} else {
			$recentlyWatched = explode('.', $recentlyWatched);
			if (in_array($id, $recentlyWatched)) {
				unset($recentlyWatched[$id]);
			}
			$recentlyWatched[] = $id;
			$recentlyWatched = implode('.', $recentlyWatched);

			setcookie(self::COOKIE_KEY, $recentlyWatched, time() + self::COOKIE_TIME, '/');
		}
	}

	public function getRecentlyWatched()
	{
		if (!empty($_COOKIE[self::COOKIE_KEY])) {
			$recentlyWatched = explode('.', $_COOKIE[self::COOKIE_KEY]);
			return array_slice($recentlyWatched, -3);
		}
		return false;
	}

	public function getAllRecentlyWatched()
	{
		if (!empty($_COOKIE[self::COOKIE_KEY])) {
			return $_COOKIE[self::COOKIE_KEY];
		}
		return false;
	}
}
