<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class TestForm extends Model
{
    public $name;
    public $email;
    public $password;
	
	public function attributeLabels()
    {
        return [
            'name' => 'Мое имя',
            'email' => 'Ваш мэйл адресс',
            'password' => 'Пароль',
            //'body' => 'Content',
        ];
    }
	
	
	public function rules()
	{
		return [
		[['name','password'],'required'],
		['email','email'],
		//['password','password'],
		];
	}
}