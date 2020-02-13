<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AddressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список адресов';
$this->params['breadcrumbs'][] = ['label' => 'список пользователей', 'url' => ['usertest/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-index">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <?php $dataProvider->pagination->pageSize=3;// echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'address_id',
           // 'user_id',
		   [
		   'attribute'=>'user_id',
		   'value'=>function($m) {
			   
			   return \app\models\Usertest::findOne($m->user_id)->firstname;
		   },
		   'filter'=>\app\models\Usertest::find()->select(['firstname','user_id'])->indexBy('user_id')->column(),
		   
		   ],
            'city:ntext',
            'postcode:ntext',
            'region:ntext',
            'street:ntext',

            ['class' => 'yii\grid\ActionColumn',
			'template' => '{delete}',
			],
        ],
    ]); ?>


</div>
