<?php

namespace app\widgets;

use common\models\User;
use frontend\models\Image;
use Yii;
use yii\base\Widget;
use Yii\helpers\Html;
use yii\web\UploadedFile;

class headermainWidget extends Widget
{

    public $message;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = new Image();
        if ($model->load(Yii::$app->request->post())) {
            $names = UploadedFile::getInstances($model, 'image');
//                echo '<pre>';
//                print_r($names);
//                die();
            foreach ($names as $name) {
                $path = 'uploads/' . md5($name->baseName) . '.' . $name->extension;
                if ($name->saveAs($path)) {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    $filename = $name->baseName . '.' . $name->extension;
                    $filepath = $path;
                    //$username = Yii::$app->user->identity->id;
                    Yii::$app->db->createCommand()->insert('image',
                        ['user_id' => 3, 'image' => $filename, 'path_image' => $filepath, 'date_create' => $date,
                            'date_update' => $date])->execute();
                }
            }
            return $this->render('headermainWidget', [
                'model' => $model,
            ]);
        }
        else{
            return $this->render('headermainWidget', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $names = UploadedFile::getInstances($model, 'image');
            foreach ($names as $name) {
                $path = 'uploads/' . md5($name->baseName) . '.' . $name->extension;
                if ($name->saveAs($path)) {
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $date = date('Y-m-d H:i:s');
                    $filename = $name->baseName . '.' . $name->extension;
                    $filepath = $path;
                    Yii::$app->db->createCommand()->insert('image',
                        ['image' => $filename, 'path_image' => $filepath, 'date_create' => $date,
                            'date_update' => $date])->execute();
                }

            }
        }
        return $this->render('headermainWidget', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


}

?>