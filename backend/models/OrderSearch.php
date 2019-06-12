<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form of `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'user_id', 'status'], 'integer'],
            [['username', 'email', 'address_home', 'address_ship', 'phone_ship', 'deliver', 'description', 'payment', 'date_order'], 'safe'],
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
        $query = Order::find();

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
            'order_id' => $this->order_id,
            'user_id' => $this->user_id,
            'date_order' => $this->date_order,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address_home', $this->address_home])
            ->andFilterWhere(['like', 'address_ship', $this->address_ship])
            ->andFilterWhere(['like', 'phone_ship', $this->phone_ship])
            ->andFilterWhere(['like', 'deliver', $this->deliver])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'payment', $this->payment]);

        return $dataProvider;
    }
}
