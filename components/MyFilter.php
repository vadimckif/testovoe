<?php
namespace app\components;
use yii\base\ActionFilter;
class MyFilter extends ActionFilter {
	public $a;
	public function __construct($a='')
	{
		$a=empty($a)?'empty':$a;
		$this->a=$a;
	}
	public function beforeAction($action)
	{
		if(!empty($this->a)&&($this->a!=='empty'))
		{
		foreach($this->a as$key=>$item)
		{
			if($key==='only')
			{
				$permission=array_values($item);
				if(in_array($action->id,$permission))
				{
					return true;
				}
				else
				{
					return false;
				}	
				
			}
		}
		}
		return true;
		//return header('location:http://ukrsms.com/account/orders/');
		//debug($this->a);
		//return true;
	}
}