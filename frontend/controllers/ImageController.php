<?php

namespace frontend\controllers;
use Yii;

use frontend\models\Image;
use yii\web\UploadedFile;

class ImageController extends \yii\web\Controller
{
    public function actionDetail($id)
    {
        $data = new Image();
        $data = $data->getOneImage($id);
        return $this->renderPartial('detail',['data'=>$data]);
    }
    public function actionDelete($id){
        $data = new Image();
        // echo '<pre>';
        // print_r($id);
        // die();
        $data = $data->deleteImage($id);
        return $this->goHome();
    }

    public function actionAdd($id){
        $model = Image::findOne($id);
        $model->wistlist = 1;
        $model->update();
//        echo '<pre>';
//        print_r($id);
//        die();
    }
    
    // public function actionDelete(){
    //     $request = Yii::$app->request;
    //     $id = $request->get("id");
    //     $model = Image::findOne($id);
    //     if ($model->delete()) {
    //     	$this->goHome();
    //     }
    // }



    public function actionUpload()
    {
        $model = new Image();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()){
                $names = UploadedFile::getInstances($model, 'image');
                foreach ($names as $name) {
                    $path = 'uploads/' . md5($name->baseName) . '.' . $name->extension;
                    if ($name->saveAs($path)) {
                        date_default_timezone_set('Asia/Ho_Chi_Minh');
                        $date = date('Y-m-d H:i:s');
                        $filename = $name->baseName . '.' . $name->extension;
                        $filepath = $path;
                        //$username = Yii::$app->user->identity->id;
//                    echo '<pre>';
//                    print_r($username);
//                    die();
                        Yii::$app->db->createCommand()->insert('image',
                            ['user_id'=>3,'image'=>$filename,'path_image'=>$filepath,'date_create'=>$date,
                                'date_update'=>$date])->execute();
                    }
                }
                return $this->redirect(Yii::$app->homeUrl.'photos');
            }

        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
