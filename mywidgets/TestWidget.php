<?php
namespace app\mywidgets;

use yii\base\Widget;
use yii\helpers\Html;

class TestWidget extends Widget
{
	public $name;
	public function init()
	{
		parent::init();
        if ($this->name != null) {
            $this->name =$this->name[0]['sourse'] ;
        }
	}
	
	public function run()
    {
		
        return $this->render('my',['model'=>$this->name]);//Html::encode($this->name);
    }
	
}