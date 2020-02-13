<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "allnews".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $link
 * @property string|null $foto
 * @property string|null $data_publish
 * @property string|null $item
 * @property string|null $sourse
 */
class Allnews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'allnews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'link', 'foto', 'item', 'sourse'], 'string'],
            [['data_publish'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'link' => 'Link',
            'foto' => 'Foto',
            'data_publish' => 'Data Publish',
            'item' => 'Item',
            'sourse' => 'Sourse',
        ];
    }
}
