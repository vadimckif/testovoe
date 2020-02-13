<?php
namespace app\components;
use yii\base\Component;
 
class Item extends Component {
	public $it;
	public function __construct()
	{
		$this->it='vadim';
		
	}
	public function yy()
	{
		return $this->it;
	}
}	