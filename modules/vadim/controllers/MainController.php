<?php
namespace app\modules\vadim\controllers;

use yii\web\Controller;
class MainController extends Controller
{
	public function actionIndex()
	{
		$arr=['vadim','ananev','uuuuu'];
		return json_encode($arr);
	}
}

