<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usertest */

$this->title = 'Редактирование пользователя: ' . $model->firstname;
$this->params['breadcrumbs'][] = ['label' => 'Список пользователей', 'url' => ['index']];

$this->params['breadcrumbs'][] = 'Редактирование';

//debug( yii\helpers\Url::to(['address/index'],true));
?>
<div class="usertest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<?php echo "<hr>" ;  ?>
<?php if(!empty($modelsaddress))
{
	?>
<div class="usertest-update">

    <h1>Редактирование и список адресов для  <?php echo $model->firstname ?></h1>

	 
<div class="usertest-form">

    <?php $form = ActiveForm::begin(
       [ 'action'=> yii\helpers\Url::to(['usertest/editaddr'])]
    ); ?>
    <input type="hidden" name="user_id" value="<?php echo $model->user_id  ?>">
   <?php
   $i=1;
      foreach($modelsaddress as $index=>$addr)
	  {
	      echo "<div class='del$i'>";
		  echo "<H3>Адрес №".$i."</H3>";
		  echo "<hr>";
		    echo $form->field($addr, "[$index]user_id")->dropDownList(\app\models\Usertest::find()->select(['firstname','user_id'])->indexBy('user_id')->column());
		  echo $form->field($addr, "[$index]city")->textInput();
		  echo $form->field($addr, "[$index]street")->textInput();
		  echo $form->field($addr, "[$index]postcode")->textInput();
		   echo $form->field($addr, "[$index]region")->textInput();

            echo "<button class='mydel' id='$i'>Удалить адрес</button>";
          echo "</div>";
		   $i++;
	  }
   
   ?>

  

  

    <div class="form-group">
        <?= Html::submitButton('Сохранить изменения по адресам', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
	
    

</div>

<?php } ?>











<?php echo "<hr>" ;  ?>




<div class="usertest-update">

    <h1>Создание адреса для пользователя <?php echo $model->firstname ?></h1>

   <?php  \yii\widgets\Pjax::begin([]); ?>
<div class="usertest-form">

    <?php $form = ActiveForm::begin(
        ['options' => ['data' => ['pjax' => true]],]
    ); ?>

    <?= $form->field($modeluser, 'user_id')->dropDownList(\app\models\Usertest::find()->select(['firstname','user_id'])->indexBy('user_id')->column(),['prompt'=>'Выберите пользователя']) ?>  

    <?= $form->field($modeluser, 'city')->textInput()  ?>

    <?= $form->field($modeluser, 'postcode')->textInput()  ?>

    <?= $form->field($modeluser, 'region')->textInput() ?>

    <?= $form->field($modeluser, 'street')->textInput()  ?>

  

    <div class="form-group">
        <?= Html::submitButton('Сохранить 2', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  <?php  \yii\widgets\Pjax::end();  ?>
</div>
	
    

</div>




