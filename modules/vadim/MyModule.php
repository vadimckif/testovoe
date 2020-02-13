<?php
namespace app\modules\vadim;
class MyModule extends \yii\base\Module {
	 public $controllerNamespace = 'app\modules\vadim\controllers';
	 public $defaultRoute='main/index';
	// public $layout='post';
	public function init()
	{
		parent::init();
	}
	
}
