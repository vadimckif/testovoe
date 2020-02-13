<?php
//use yii\bootstrap\DatePicker;

use kartik\date\DatePicker;
use app\mywidgets\TestWidget;
use yii\helpers\Url;
//use Yii;
debug($alias);
//Yii::setAlias('@foo', '/path2/bar');
//debug(Yii::getAlias('@foo')); 
?>
<a href='<?php echo Url::to(['login/part','title'=>4,'page'=>7]);  ?>'>link</a>
<form >
<?php
echo DatePicker::widget([
    'name' => 'dp_1',
    'type' => DatePicker::TYPE_INPUT,
    'value' => '23-Feb-1982',
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-M-yyyy'
    ]
]);
?>
<p><input type="submit"></p>
</form>
<?php
//echo TestWidget::widget(['name'=>$model]);
?>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Username</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
<button class="tt">777</button>
