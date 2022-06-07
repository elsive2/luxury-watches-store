<?php

namespace ishop;

class Registry
{
	use Singletone;

	private static array $properties = [];

	public function setProperty($name, $value)
	{
		self::$properties[$name] = $value;
	}

	public function getProperty($name)
	{
		return isset(self::$properties[$name])
			? self::$properties[$name]
			: null;
	}

	public function getProperties(): array
	{
		return self::$properties;
	}
}
