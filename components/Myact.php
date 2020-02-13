<?php
namespace app\components;
use yii\base\Action;

class Myact extends Action {
	
	public function run()
    {
		$a='234234';
       // return $this->redirect('http://example.com');//$this->render('ttt');//$a;//debug(\Yii::$app->request->get());
	 return  header( 'Location: http://google.ru/search?q=redirect' );//\Yii::$app->response->redirect(['my/index']);
	//return $this->redirect('http://example.com');
    }
	
}