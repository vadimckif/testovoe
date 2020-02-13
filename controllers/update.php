<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usertest */

$this->title = 'Редактирование пользователя: ' . $model->firstname;
$this->params['breadcrumbs'][] = ['label' => 'Список пользователей', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="usertest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<div class="usertest-update">

    <h1>Создание адреса для пользователя <?php echo $model->firstname ?></h1>

	 
<div class="usertest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($modeluser, 'user_id')->dropDownList(\app\models\Usertest::find()->column(['user_id','firstname'])->indexBy('user_id')->column()) ?>  

    <?= $form->field($modeluser, 'city')->textInput()  ?>

    <?= $form->field($modeluser, 'postcode')->textInput()  ?>

    <?= $form->field($modeluser, 'region')->textInput() ?>

    <?= $form->field($modeluser, 'street')->textInput()  ?>

  

    <div class="form-group">
        <?= Html::submitButton('Сохранить 2', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
	
    

</div>



