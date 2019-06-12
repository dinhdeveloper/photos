<?php

namespace frontend\controllers;
use frontend\models\Album;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$data = Album::find()->all();
        return $this->renderPartial('index',['albums'=>$data]);
    }
}

?>
