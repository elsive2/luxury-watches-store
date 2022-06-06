<?php

namespace ishop;

trait Singletone
{
	private static $instance;

	private function __construct()
	{
	}

	public static function instance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new self;
		}
		return self::$instance;
	}
}
