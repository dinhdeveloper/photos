<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property int $album_id
 * @property int $user_id
 * @property string $title
 * @property string $album_image
 * @property int $deleted
 * @property string $date_create
 * @property string $date_update
 * @property int $status
 *
 * @property User $user
 * @property AlbumImage[] $albumImages
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['album_id', 'user_id', 'date_create', 'date_update'], 'required'],
            [['album_id', 'user_id', 'deleted', 'status'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            [['title', 'album_image'], 'string', 'max' => 255],
            [['album_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'album_id' => 'Album ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'album_image' => 'Album Image',
            'deleted' => 'Deleted',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumImages()
    {
        return $this->hasMany(AlbumImage::className(), ['album_id' => 'album_id']);
    }

}
