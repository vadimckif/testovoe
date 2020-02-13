<?php
namespace app\models;
use yii\db\ActiveRecord;
class Mylogin extends ActiveRecord
{
	public $username;
	public $password;
	public $email;
	const SCENARIO_LOGIN='login';
	const SCENARIO_REG='reg';
	public function rules()
	{
		return [
		[['username','password'],'required','on'=>self::SCENARIO_LOGIN],
		[['username','password','email'],'required','on'=>self::SCENARIO_REG],
		['email','email','on'=>self::SCENARIO_REG],
		];
	}
/*	public function scenarios()
	{
		$scenario=parent::scenarios();
		$scenario[self::SCENARIO_LOGIN]=['username','password','email'];
		$scenario[self::SCENARIO_REG]=['username','password','email'];
		return $scenario;
	}*/
	
}