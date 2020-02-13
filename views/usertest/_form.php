<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usertest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usertest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'firstname')->textInput()  ?>

    <?= $form->field($model, 'lastname')->textInput()  ?>

    <?= $form->field($model, 'email')->textInput()  ?>

    <?= $form->field($model, 'user_type')->dropDownList(['client'=>'Клиент','admin'=>'Администратор'],['prompt' => 'Выбор типа пользователя']) ?>

    <?= $form->field($model, 'password')->textInput()  ?>

  
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
