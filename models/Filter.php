<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oc_filter".
 *
 * @property int $filter_id
 * @property int $filter_group_id
 * @property int $sort_order
 */
class Filter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oc_filter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filter_group_id', 'sort_order'], 'required'],
            [['filter_group_id', 'sort_order'], 'integer'],
        ];
    }
   public function getName()
    {
        return $this->getDesc()->where(['language_id'=>1])->one()['name'];
    }
   
    public function getDesc()
    {
        return $this->hasOne(FilterDescription::className(), ['filter_id' => 'filter_id'])->where(['language_id'=>1]);
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'filter_id' => 'Filter ID',
            'filter_group_id' => 'Filter Group ID',
            'sort_order' => 'Sort Order',
        ];
    }
}
