<?php
namespace app\models;
use yii\db\ActiveRecord;
class Country extends ActiveRecord {
	public $nname;
	public static $test='456';
	public $cat_id;
	public $ev=888;
	const MY_EV = 'my_ev';
	public  function ii()
	{
		$this->trigger(self::MY_EV);
		return $this->ev;
	}
	public function rules()
{
    return [
        // атрибут required указывает, что name, email, subject, body обязательны для заполнения
        [['language_id','name'], 'required'],

        // атрибут email указывает, что в переменной email должен быть корректный адрес электронной почты
        //['email', 'email'],
    ];
}
	public static function tableName()
	{
		return "{{oc_stock_status}}";
	}
	
}