<?php

namespace app\controllers;

use app\models\AppModel;
use ishop\base\Controller as BaseController;

class Controller extends BaseController
{
	public function __construct($route)
	{
		parent::__construct($route);
		new AppModel;
	}
}
