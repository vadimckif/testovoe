<?php
namespace app\components;
use yii\base\Behavior;
class MyBeh extends  Behavior {
    public $yii;
    public function __construct()
    {
        $this->yii='vadik_molodec';
    }
    public function events()
    {
        return [
            MycomController::EVO=>'edit',
        ];
    }
    public function edit($e)
    {
       // debug($e);
        $this->owner->name=$this->yii;
    }
    public function ooo()
    {
        return $this->owner->name='gora';
    }

}