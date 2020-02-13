<?php

namespace app\controllers;

use Yii;
use app\models\Usertest;
use app\models\Usertestsearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsertestController implements the CRUD actions for Usertest model.
 */
class UsertestController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Usertest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Usertestsearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usertest model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usertest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usertest();
         $model->on(Usertest::EVENT_BEFORE_INSERT, function ($event) {
   $event->sender->created_ad=gmdate("Y-m-d H:i:s");
});
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Usertest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
         $model=$this->findModel($id);
		
         $modeluser=new \app\models\Address(['user_id'=>$id]);
		 $modelsaddress=\app\models\Address::find()->where(['user_id'=>$id])->indexBy('address_id')->all();
		 
		 
		 if(Yii::$app->request->post('Usertest'))
		 {
		
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
          }
		 }
		 elseif(Yii::$app->request->post('Address'))
		 {




			 if($modeluser->load(Yii::$app->request->post())&&$modeluser->save())
			 {
				 
				 return $this->redirect(['address/index']);
			 }
			//debug(Yii::$app->request->post()); 
		 }
		 else
		 {
			   return $this->render('update', [
            'model' => $model,
			'modeluser'=>$modeluser,
			'modelsaddress'=>$modelsaddress,
        ]);
			 
		 }
        return $this->render('update', [
            'model' => $model,
            'modeluser'=>$modeluser,
            'modelsaddress'=>$modelsaddress,
        ]);
    }

    /**
     * Deletes an existing Usertest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */



    public function actionEditaddr()
    {
if(Yii::$app->request->post('user_id')) {
 if(empty(Yii::$app->request->post('Address')))
 {
     \app\models\Address::deleteAll(['user_id'=>Yii::$app->request->post('user_id')]);
 }

    $user_id=Yii::$app->request->post('user_id');
$modelsaddress=\app\models\Address::find()->where(['user_id'=>$user_id])->indexBy('address_id')->all();

    if (yii\base\Model::loadMultiple($modelsaddress,Yii::$app->request->post()) && \yii\base\Model::validateMultiple($modelsaddress)) {
       $arr_keys_del= array_diff(array_keys($modelsaddress),array_keys(Yii::$app->request->post('Address')));
         foreach($arr_keys_del as $key)
         {

             $modelsaddress[$key]->delete();
             unset($modelsaddress[$key]);
         }
          foreach ($modelsaddress as $setting) {
            $setting->save(false);
        }


        return $this->redirect(['address/index']);
    }
}
else
{
    return $this->redirect(['address/index']);
}
    }





    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usertest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usertest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usertest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
