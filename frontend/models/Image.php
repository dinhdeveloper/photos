<?php

namespace frontend\models;
use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $image_id
 * @property int $user_id
 * @property string $image
 * @property string $path_image
 * @property string $description
 * @property string $location
 * @property string $date_create
 * @property string $date_update
 * @property int $deleted
 * @property int $wistlist
 *
 * @property AlbumImage[] $albumImages
 * @property User $user
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['image'],'file','maxFiles'=>10],
            [['user_id', 'image', 'path_image'], 'required'],
            [['user_id', 'deleted', 'wistlist'], 'integer'],
            [['location'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [[ 'image','path_image', 'description'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'image_id' => 'Image ID',
            'user_id' => 'User ID',
            'image' => '
               Upload
            ',
            'path_image' => 'Path Image',
            'description' => 'Description',
            'location' => 'Location',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'deleted' => 'Deleted',
            'wistlist' => 'Wistlist',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumImages()
    {
        return $this->hasMany(AlbumImage::className(), ['image_id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getOneImage($id){
        $data = Image::find()
            ->asArray()
            ->where('image_id=:id',['id'=>$id])
            ->one();
        return $data;
    }

    public function deleteImage($id){
        $data = Image::findOne($id);
//        echo '<pre>';
//        print_r($delete);
//        die();
        $data->deleted = 1;
        $data->update();
    }
    public function undeleteImage($id){
        $data = Image::findOne($id);
        $data->deleted = 0;
        $data->update();
    }
}
