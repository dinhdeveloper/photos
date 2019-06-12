<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrderDetail;

/**
 * OrderDetailSearch represents the model behind the search form of `app\models\OrderDetail`.
 */
class OrderDetailSearch extends OrderDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['detail_id', 'order_id', 'pro_id', 'pro_quantity', 'status_detail_id', 'status'], 'integer'],
            [['pro_price'], 'number'],
            [['date_create', 'date_update'], 'safe'],
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
        $query = OrderDetail::find();

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
            'detail_id' => $this->detail_id,
            'order_id' => $this->order_id,
            'pro_id' => $this->pro_id,
            'pro_price' => $this->pro_price,
            'pro_quantity' => $this->pro_quantity,
            'status_detail_id' => $this->status_detail_id,
            'status' => $this->status,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
        ]);

        return $dataProvider;
    }
}
