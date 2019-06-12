<?php

namespace frontend\controllers;
use frontend\models\Image;

class TrashController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$data = Image::find()->where('deleted = 1')->all();
        return $this->renderPartial('trash',['trash'=>$data]);
    }
    public function actionDelete($id){
        echo '<pre>';
        print_r($id);
        die();
//        $da = new Image();
//        $da = $da->undeleteImage($id);
//        return $this->goHome();
    }
}

?>