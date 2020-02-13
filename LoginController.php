<?php
namespace app\controllers;
use Yii;
use app\assets\AppAsset;
use yii\web\View;
use yii\helpers\Url;
use yii\web\Controller;
use app\models\Mylogin;
use app\models\Allnews;
class LoginController extends Controller
{
	/*public function behaviors()
	{
		return [[
		'class'=>'app\components\MyFilter',
		//'only'=>['login','reg'],
		//'allow'=>true,
		]
		];
	}*/
	//public $layout='post';
	public $name='Vadim Vladimirovich';
	public function getName()
	{
		return $this->name;
	}
	public function actionLogin()
	{
		$model=new Mylogin();
		$model->scenario='login';
		//$model->load(['Mylogin'=>['username'=>'vadim','password'=>1234567,'email'=>'sdfs']]);
		$model->attributes=['username'=>'vadim','password'=>1234567,'email'=>'sdfs'];
		$validate=$model->validate()?'da':$model->errors;
		/*$model->username='vadim';
		$model->password='123';
		$model->email='asdsa@ukr.met';*/
	return $this->render('login',['model'=>[$validate,$model]]);
	}
	public function actionReg()
	{
				$model=new Mylogin();
		$model->scenario=Mylogin::SCENARIO_REG;
		$model->attributes=['username'=>'vadim','password'=>1234567,'email'=>'sdfs'];
		$validate=$model->validate()?'da':$model->errors;
		return $this->render('reg',['model'=>[$validate,$model]]);
	}
	public function actionPart()
	{
		/*\Yii::$app->view->on(View::EVENT_END_BODY, function () {
    echo date('Y-m-d');
});*/
$get='';
      if(Yii::$app->request->isGet)
	  {
		  $get=$_SERVER;//Yii::$app->request->absoluteUrl;
	  }
		$name="vadim";
		$params=Yii::getAlias('@dir');
		//$this->registerMetaTag(['name' => 'keywords', 'content' => 'yii, framework, php']);
	//	$part= $this->renderPartial('part1',['name'=>$name]);
		return $this->render('part2',['name'=>$name,'pars'=>$get]);
		
	}
	public function actionIndex()
	{
		//AppAsset::register(Yii::$app->view)->baseUrl='768';
		
       //Yii::
		$model=Yii::getAlias('@vadim');
		return $this->render('index',['model'=>$model,'alias'=>Url::to(['http://example.com/'],'https')]);
	}
	public function actionJson()
	{
		/*$arr=['vadim','ira'];
	Yii::$app->response->format=\yii\web\Response::HTML;
		Yii::$app->response->data=$arr;*/
		\Yii::$app->response->sendFile('uu.php')->send();


	}
}
