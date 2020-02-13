<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $user_type
 * @property string $password
 * @property string $created_ad
 */
class Usertest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'email', 'user_type', 'password'], 'required','message'=>'Ведите значение' ],
            [['firstname', 'lastname', 'email', 'user_type', 'password'], 'string'],
			[['email'],'unique','message'=>'Не уникальное'],
			[['email'],'email','message'=>'Должно быть адресом почты'],
            [['created_ad'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'email' => 'Почта',
            'user_type' => 'Тип пользователя',
            'password' => 'Пароль',
            'created_ad' => 'Время создания',
        ];
    }
}
