<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Guest */
/* @var $form ActiveForm */
?>
<div class="login-ok">
 <?php   Pjax::begin([
    // Опции Pjax
    ]); ?>
    <?php $form = ActiveForm::begin(
         ['options' => ['data' => ['pjax' => true]],
    ]); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password') ?>
    <?= $form->field($model, 'male[nn][]')->checkboxList(['1' => 'Ona', '2' => 'On']) ?>
    <div class="form-group field-guest-fam required">
        <label class="control-label" for="guest-fam">familia</label>
        <input type="text" id="guest-fam" class="form-control" name="Guest[fam]" aria-required="true">

        <div class="help-block"></div>
    </div>


    <?= $form->field($model, 'male[pp][]')->checkboxList(['1' => 'Ona1', '2' => 'On2']) ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
<?php Pjax::end(); ?>
</div><!-- login-ok -->
