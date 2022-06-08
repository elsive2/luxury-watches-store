<?php

namespace ishop;

class Cache
{
	public static function get($key, $default = null)
	{
		$file = CACHE . '/' . md5($key) . '.txt';
		if (file_exists($file)) {
			$content = unserialize(\file_get_contents($file));
			if (time() <= $content['end_time']) {
				return $content['data'];
			}
			unlink($file);
		}
		return $default;
	}

	public static function set($key, $value, $seconds = 3600)
	{
		if ($seconds) {
			$content['data'] = $value;
			$content['end_time'] = time() + $seconds;
			return \file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content));
		}
		return false;
	}

	public static function delete($key)
	{
		$file = CACHE . '/' . md5($key) . '.txt';
		if (file_exists($file)) {
			unlink($file);
		}
	}

	public static function clear()
	{
		$files = glob(CACHE . '/*');
		foreach ($files as $file) {
			if (is_file($file)) {
				unlink($file);
			}
		}
	}

	public static function getMultiple($keys, $default = null)
	{
		$values = [];
		foreach ($keys as $key) {
			$values[] = self::get($key);
		}
		return $values;
	}

	public static function deleteMultiple($keys)
	{
		foreach ($keys as $key) {
			self::delete($key);
		}
	}

	public static function has($key)
	{
		return file_exists(CACHE . '/' . md5($key) . '.txt');
	}
}
