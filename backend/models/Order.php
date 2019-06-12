<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $order_id
 * @property int $user_id
 * @property string $username
 * @property string $email
 * @property string $address_home
 * @property string $address_ship
 * @property string $phone_ship
 * @property string $deliver
 * @property string $description
 * @property string $payment
 * @property string $date_order
 * @property int $status
 *
 * @property Orderdetail[] $orderdetails
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'deliver', 'payment', 'date_order', 'status'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['date_order'], 'safe'],
            [['username', 'email', 'phone_ship', 'deliver', 'payment'], 'string', 'max' => 50],
            [['address_home', 'address_ship'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'username' => 'Username',
            'email' => 'Email',
            'address_home' => 'Address Home',
            'address_ship' => 'Address Ship',
            'phone_ship' => 'Phone Ship',
            'deliver' => 'Deliver',
            'description' => 'Description',
            'payment' => 'Payment',
            'date_order' => 'Date Order',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdetails()
    {
        return $this->hasMany(Orderdetail::className(), ['order_id' => 'order_id']);
    }
}
