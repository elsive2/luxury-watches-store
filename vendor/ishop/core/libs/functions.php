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
