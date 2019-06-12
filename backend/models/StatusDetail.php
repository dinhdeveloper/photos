<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statusdetail".
 *
 * @property int $status_id
 * @property string $status_name
 *
 * @property Orderdetail[] $orderdetails
 */
class StatusDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statusdetail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status_name'], 'required'],
            [['status_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'status_name' => 'Status Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdetails()
    {
        return $this->hasMany(Orderdetail::className(), ['status_detail_id' => 'status_id']);
    }
}
