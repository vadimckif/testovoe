<?php
 
namespace app\components;
 use Yii;
use yii\base\Component;
 
class Myboot extends Component {
 public $name;
 public function __construct()
 {
   /*  \yii\base\Event::on(\yii\base\View::className(), \yii\base\View::EVENT_BEFORE_RENDER, function ($event) {
         debug($event);
      
     });*/
	//Yii::setAlias('@r','app\components');
	Yii::$classMap['app\components\MycomController']='/sata2/home/users/bsl/www/yii2.mazaika.net/components/MycomController.php';
	 Yii::setAlias('@components', '@app/components');
 }
    public function out() {
        return '777333777';
    }
 
}