<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_id', 'cate_id', 'status'], 'integer'],
            [['pro_name', 'pro_image', 'description', 'date_sale_off', 'end_sale_off', 'pro_slug', 'date_create', 'date_update'], 'safe'],
            [['pro_price', 'price_sale_off'], 'number'],
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
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pro_id' => $this->pro_id,
            'cate_id' => $this->cate_id,
            'pro_price' => $this->pro_price,
            'price_sale_off' => $this->price_sale_off,
            'date_sale_off' => $this->date_sale_off,
            'end_sale_off' => $this->end_sale_off,
            'status' => $this->status,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        $query->andFilterWhere(['like', 'pro_name', $this->pro_name])
            ->andFilterWhere(['like', 'pro_image', $this->pro_image])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'pro_slug', $this->pro_slug]);

        return $dataProvider;
    }
}
