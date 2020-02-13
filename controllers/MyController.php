<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\TestForm;
use app\models\Fishki;
use yii\data\Pagination;

class MyController extends Controller {
	public function actionContact()
	{
		echo 9999999999999999;
	}
	public function actions()
	{
		return [
		'inact'=>'app\components\Myact'
		];
	}
	public function actionBaza()
	{
		$model=new Fishki();
		$query=$model->find();
		
		 $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $data = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
		
		
		
		//$data=$data->all();
		//$query=
		//$data=Fishki::find()->all();
		return $this->render('baza',['data'=>$data,'pagination'=>$pagination]);
	}
	public function actionIndex()
	{
		$modelForm=new TestForm();
		
		if(Yii::$app->request->post())
		{
			$modelForm->name='vadim';
			$modelForm->email='vadim3333@ukr.net';
			$modelForm->password='vadim34534534';
			//$modelForm->attributes=['name'=>'vadim','email'=>'fab','password'=>'45456'];
			if($modelForm->validate())
			{
				debug($modelForm);
			}
			else
			{
				debug('ne naebesh');
			}
			//$modelForm->load(Yii::$app->request->post());
			//debug(Yii::$app->request->post('TestForm'));
			
			//$formData=Yii::$app->request->post();
			
			//return $this->render('submit',['data'=>$formData,'model'=>$modelForm]);
			
		}
		
		
		
		/*if($modelForm->load(Yii::$app->request->post())&&$modelForm->validate())
		{
			$formData=Yii::$app->request->post();
			
			return $this->render('submit',['data'=>$formData,'model'=>$modelForm]);
		}
		$modelForm->name='vadim';*/
		return $this->render('index',['testForm'=>$modelForm,'app'=>$modelForm]);
	}
}