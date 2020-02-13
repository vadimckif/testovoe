<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //debug($namesfilter);
	// echo $this->render('_search', ['model' => $searchModel]); ?>
     
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'category_id',
            'image',
			[
			'attribute'=>'names',
			'value'=>function($model) {
				return $model->name;
			},
			'filter'=>[
                    $namesfilter
                ]
			
			],
            'parent_id',
            'top',
			
            'column',
            'sort_order',
          //  'status',
			[
			'attribute'=>'status',
			'value'=>function ($model, $key, $index, $column) {
                    $active = $model->status === 1;
                    return \yii\helpers\Html::tag(
                        'span',
                        $active ? 'Yes' : 'No',
                        [
                            'class' => 'label label-' . ($active ? 'success' : 'danger'),
                        ]
                    );
                },
				'format'=>'html',
				'filter' => [
                    0 => 'No',
                    1 => 'Yes',
                ],
			],
            'date_added',
            'date_modified',

            ['class' => 'yii\grid\ActionColumn',
			'template' => '{update} {delete}',
			],
        ],
    ]); 
	?>


</div>
