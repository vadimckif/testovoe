<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $address_id
 * @property int $user_id
 * @property string|null $city
 * @property string|null $postcode
 * @property string|null $region
 * @property string|null $street
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id','city', 'postcode', 'region', 'street'], 'required'],
            [['user_id'], 'integer'],
            [['city', 'postcode', 'region', 'street'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'user_id' => 'Пользователь',
            'city' => 'Город',
            'postcode' => 'Почтовый индекс',
            'region' => 'Регион',
            'street' => 'Улица',
        ];
    }
}
