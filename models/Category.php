<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oc_category".
 *
 * @property int $category_id
 * @property string|null $image
 * @property int $parent_id
 * @property int $top
 * @property int $column
 * @property int $sort_order
 * @property int $status
 * @property string $date_added
 * @property string $date_modified
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $_name;
    public $_filterArrGet;
    public $_filterArrSet;
	public function getFilterArr()
	{
	if($this->_filterArrGet===null)
	{
		$this->_filterArrGet=$this->getFilters()->select('filter_id')->column();
	}
     return $this->_filterArrGet;
	}




    public function getName()
    {
        return $this->getDesc()->where(['language_id'=>1])->one()['name'];
    }
    public static function tableName()
    {
        return 'oc_category';
    }
    public function getDesc()
    {
        return $this->hasOne(CategoryDescription::className(), ['category_id' => 'category_id'])->where(['language_id'=>1]);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $name=$this->_name;
            $arr=$this->_filterArrSet;
          //  debug($this->_filterArrSet);
           // die();
            $category_id=$this->category_id;
       $cat_desc=CategoryDescription::find()->where(['language_id'=>1,'category_id'=>$category_id])->one();
       $cat_desc->name=$name;
       $cat_desc->save(false);

            CategoryFilter::deleteAll(['category_id' =>$this->category_id]);
          if($arr)
          {
              foreach($arr as $filter)
              {
                 $obj= new CategoryFilter();
                 $obj->category_id=$this->category_id;
                 $obj->filter_id=$filter;
                 $obj->save(false);
              }
          }




            return true;
        } else {
            return false;
        }
    }






	public function getNamesi()
	{
		$rows = (new \yii\db\Query())
    ->select(['name'])
    ->from('oc_category_description')
    ->where(['language_id' => 1])
   ->indexBy('name')
    ->all();
	return $rows;
	}
	public function setName($name)
    {
        $this->_name=$name;
    }
    /*public function setFilterArr($name)
    {
        $this->_filterArrSet=$name;
    }*/
    //public function set

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'top', 'column', 'sort_order', 'status'], 'integer'],
            [['top', 'column', 'status', 'date_added', 'date_modified'], 'required'],
            [['date_added', 'date_modified','name','_filterArrSet'], 'safe'],
            [['image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'image' => 'Image',
            'parent_id' => 'Parent ID',
            'top' => 'Top',
            'column' => 'Column',
            'sort_order' => 'Sort Order',
            'status' => 'Status',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        ];
    }
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'product_id'])
            ->viaTable('oc_product_to_category', ['category_id' => 'category_id']);
    }
	
	public function getFilters()
	{
		return $this->hasMany(Filter::className(), ['filter_id' => 'filter_id'])
            ->viaTable('oc_category_filter', ['category_id' => 'category_id']);
	}
}
