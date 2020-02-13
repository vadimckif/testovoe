<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Category;

/**
 * CategorySearch represents the model behind the search form of `app\models\Category`.
 */
class CategorySearch extends Category
{
    /**
     * {@inheritdoc}
     */
	 public $names;
    public function rules()
    {
        return [
            [['category_id', 'parent_id', 'top', 'column', 'sort_order', 'status'], 'integer'],
            [['image', 'date_added', 'date_modified','names'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Category::find()->leftJoin('oc_category_description', 'oc_category_description.category_id = oc_category.category_id')
		->where([	'oc_category_description.language_id'=>1	])
		;

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

		$dataProvider->sort->attributes['names'] = [
        'asc' => [ 'oc_category_description.name'=> SORT_ASC],
        'desc' => [ 'oc_category_description.name'=> SORT_DESC],
    ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
		      'oc_category_description.name' => $this->names,
            'oc_category.category_id' => $this->category_id,
            'parent_id' => $this->parent_id,
            'top' => $this->top,
            'column' => $this->column,
            'sort_order' => $this->sort_order,
            'status' => $this->status,
            'date_added' => $this->date_added,
            'date_modified' => $this->date_modified,
        ]);

        $query->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
