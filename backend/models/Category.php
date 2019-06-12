<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $cate_id
 * @property string $cate_name
 * @property string $cate_slug
 * @property int $parent_id
 * @property string $cate_image
 * @property int $status
 * @property string $date_create
 * @property string $date_update
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cate_name', 'cate_slug', 'status'], 'required'],
            [['parent_id', 'status'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['cate_name', 'cate_slug', 'cate_image'], 'string', 'max' => 50],
            [['cate_slug'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cate_id' => 'Category ID',
            'cate_name' => 'Category Name',
            'cate_slug' => 'Category Slug',
            'parent_id' => 'Parent ID',
            'cate_image' => 'Category Image',
            'status' => 'Status',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['cate_id' => 'cate_id']);
    }

    public function getAllCate(){
        $data = Category::find()
            ->where(['status'=>'1'])
            ->asArray()
            ->all();
        return $data;
    }
}
