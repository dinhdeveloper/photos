<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderdetail".
 *
 * @property int $detail_id
 * @property int $order_id
 * @property int $pro_id
 * @property double $pro_price
 * @property int $pro_quantity
 * @property int $status_detail_id
 * @property int $status
 * @property string $date_create
 * @property string $date_update
 *
 * @property Order $order
 * @property Product $pro
 * @property Statusdetail $statusDetail
 */
class Orderdetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderdetail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'pro_id', 'pro_price', 'pro_quantity', 'status_detail_id', 'status', 'date_create'], 'required'],
            [['order_id', 'pro_id', 'pro_quantity', 'status_detail_id', 'status'], 'integer'],
            [['pro_price'], 'number'],
            [['date_create', 'date_update'], 'safe'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'order_id']],
            [['pro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pro_id' => 'pro_id']],
            [['status_detail_id'], 'exist', 'skipOnError' => true, 'targetClass' => Statusdetail::className(), 'targetAttribute' => ['status_detail_id' => 'status_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'detail_id' => 'Detail ID',
            'order_id' => 'Order ID',
            'pro_id' => 'Pro ID',
            'pro_price' => 'Pro Price',
            'pro_quantity' => 'Pro Quantity',
            'status_detail_id' => 'Status Detail ID',
            'status' => 'Status',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['order_id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPro()
    {
        return $this->hasOne(Product::className(), ['pro_id' => 'pro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatusDetail()
    {
        return $this->hasOne(Statusdetail::className(), ['status_id' => 'status_detail_id']);
    }
}
