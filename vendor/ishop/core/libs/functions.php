<?php

function debug($element)
{
	echo '<pre>' . print_r($element, true) . '</pre>';
}

function existsInRedbeanObjects(array $arr, $key, $value): bool
{
	foreach ($arr as $obj) {
		if ($obj[$key] == $value) {
			return true;
		}
	}
	return false;
}

function redirect($url = false)
{
	if ($url) {
		$redirect = $url;
	} else {
		$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : BASE_URI;
	}
	header("Location: $redirect");
	exit;
}
