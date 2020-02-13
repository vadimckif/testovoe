<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class TetstWidget extends Widget
{
	public $name;
	public function init()
	{
		parent::init();
        if ($this->name === null) {
            $this->name = 'Hello World';
        }
	}
	
	public function run()
    {
        return Html::encode($this->name);
    }
	
}