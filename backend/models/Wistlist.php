<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wistlist".
 *
 * @property int $wis_id
 * @property int $user_id
 * @property int $pro_id
 * @property string $date_wistlist
 *
 * @property Product $pro
 */
class Wistlist extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wistlist';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'pro_id', 'date_wistlist'], 'required'],
            [['user_id', 'pro_id'], 'integer'],
            [['date_wistlist'], 'safe'],
            [['pro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['pro_id' => 'pro_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'wis_id' => 'Wis ID',
            'user_id' => 'User ID',
            'pro_id' => 'Pro ID',
            'date_wistlist' => 'Date Wistlist',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPro()
    {
        return $this->hasOne(Product::className(), ['pro_id' => 'pro_id']);
    }
}
