<?php
 
namespace app\components;
 
use yii\base\Component;
 
class MycomController extends Component {
    const EVO = "evo";
 public $name;
 public function __construct()
 {
	 $this->name='vadim';
 }
 /*public function behaviors()
 {
     return [
         [
             'class'=>'\app\components\MyBeh',
             'yii'=>'vova',
         ],

     ];
 }*/
    public function out() {
       $this->trigger(self::EVO);
        return $this->name;
    }
 
}