<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $pro_id
 * @property int $cate_id
 * @property string $pro_name
 * @property string $pro_image
 * @property double $pro_price
 * @property double $price_sale_off
 * @property string $description
 * @property string $date_sale_off
 * @property string $end_sale_off
 * @property string $pro_slug
 * @property int $status
 * @property string $date_create
 * @property string $date_update
 *
 * @property Orderdetail[] $orderdetails
 * @property Category $cate
 * @property Wistlist[] $wistlists
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_id', 'pro_name', 'pro_image', 'pro_price', 'pro_slug', 'status'], 'required'],
            [['cate_id', 'status'], 'integer'],
            [['pro_price', 'price_sale_off'], 'number'],
            [['date_sale_off', 'end_sale_off', 'date_create', 'date_update'], 'safe'],
            [['pro_name', 'pro_slug'], 'string', 'max' => 50],
            [['pro_image'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 250],
            [['pro_slug'], 'unique'],
            [['cate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['cate_id' => 'cate_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'Pro ID',
            'cate_id' => 'Cate ID',
            'pro_name' => 'Pro Name',
            'pro_image' => 'Pro Image',
            'pro_price' => 'Pro Price',
            'price_sale_off' => 'Price Sale Off',
            'description' => 'Description',
            'date_sale_off' => 'Date Sale Off',
            'end_sale_off' => 'End Sale Off',
            'pro_slug' => 'Pro Slug',
            'status' => 'Status',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderdetails()
    {
        return $this->hasMany(Orderdetail::className(), ['pro_id' => 'pro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCate()
    {
        return $this->hasOne(Category::className(), ['cate_id' => 'cate_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWistlists()
    {
        return $this->hasMany(Wistlist::className(), ['pro_id' => 'pro_id']);
    }
}
