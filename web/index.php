<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');
//defined('YII_DEBUG') or define('YII_DEBUG', true);
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
function debug($arr)
{
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
