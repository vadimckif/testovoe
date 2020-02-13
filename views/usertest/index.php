<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Usertestsearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список пользователей';
$this->params['breadcrumbs'][] = ['label' => 'список адресов', 'url' => ['address/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usertest-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<?php //echo gmdate("Y-m-d H:i:s");  ?>
    <?= GridView::widget([
	'emptyText' => 'Ничего нет',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'firstname:ntext',
            'lastname:ntext',
            'email:ntext',
            //'user_type:ntext',
			[
			'attribute'=>'user_type',
			'filter'=>[
			'admin'=>'Администратор',
			'client'=>'Клиент',
			],
			],
            'password:ntext',
            'created_ad',

            ['class' => 'yii\grid\ActionColumn',
			'template' => '{update} {delete}',
			],
        ],
    ]); ?>


</div>
