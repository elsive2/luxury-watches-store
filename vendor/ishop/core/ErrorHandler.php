<?php

namespace ishop;

use Exception;

class ErrorHandler
{
	public function __construct()
	{
		if (DEBUG) {
			error_reporting(E_ALL);
		} else {
			error_reporting(0);
		}
		set_exception_handler([$this, 'exceptionHandler']);
	}

	public function exceptionHandler(\Throwable $e)
	{
		$this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
		$this->displayError('Exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
	}

	private function logErrors(string $message = '', string $file = '', int $line = 1)
	{
		error_log(
			"[" . date('Y-m-d H:i:s') . "] Message: {$message} | File: {$file} | Line: {$line}\n",
			3,
			ROOT . '/tmp/errors.log'
		);
	}

	private function displayError(string $errno, string $errMessage, string $errFile, int $errLine, int $status)
	{
		http_response_code($status);

		if (DEBUG) {
			require WWW . '/errors/dev.php';
		} else {
			require WWW . '/errors/prod.php';
		}
	}
}
