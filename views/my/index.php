<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
//use Yii;
$this->title='vadim';
$this->params['breadcrumbs'][] = $this->title;
debug($this->params['breadcrumbs']);
$form=ActiveForm::begin();

echo $form->field($testForm,'name');
echo $form->field($testForm,'email');
echo $form->field($testForm,'password')->passwordInput();

echo Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']);


ActiveForm::end(); 
//debug();
debug($app->attributes);
