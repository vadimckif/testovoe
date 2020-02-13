<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'top')->textInput() ?>

    <?= $form->field($model, 'column')->textInput() ?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

    <?= $form->field($model, 'status')->checkbox(); ?>
	
	

    <?= $form->field($model, 'date_added')->textInput() ?>

    <?= $form->field($model, 'date_modified')->textInput() ?>
	<hr>
	<hr>
	<hr>
	<hr>
    <?= $form->field($model, 'name')->textInput() ?>
	                                                          
	  <?= $form->field($model, 'filterArr')->checkboxList(\app\models\Filter::find()->select(['oc_filter_description.name'])->join('LEFT JOIN','oc_filter_description','oc_filter_description.filter_id=oc_filter.filter_id')->where(['oc_filter_description.language_id'=>1])->indexBy('oc_filter.filter_id')->column())?>

	
	
	

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php 
	//debug($modelFilters);
	echo "<hr>";
/*	$filters=$model->filters;
	foreach($filters as $filter)
	{
		debug($filter);
	}*/
	?>
</div>
