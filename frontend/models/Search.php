<?php

namespace frontend\models;

use common\models\Product;
use common\models\ProductSearch;
use yii\data\ActiveDataProvider;

class Search extends ProductSearch
{
    public $search;

    public function rules()
    {
        return [
            ['search', 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            $query->where('0=1');

            return $dataProvider;
        }

        $query->orFilterWhere(['like', 'name', $this->search])
            ->orFilterWhere(['like', 'price', $this->search])
            ->orFilterWhere(['like', 'date', $this->search])
            ->orFilterWhere(['like', 'slug', $this->search])
            ->orFilterWhere(['like', 'description', $this->search])
            ->orFilterWhere(['like', 'meta_description', $this->search])
            ->orFilterWhere(['like', 'meta_keywords', $this->search]);

        return $dataProvider;
    }
}