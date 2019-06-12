<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'cate_id',
            'cate_name',
            'cate_slug',
            //'cate_image',
            [
                    'attribute'=> 'cate_image',
                    'label'=>'Image',
                    'format'=>'raw',
                'value'=> function($data){
                    $url = Yii::getAlias('@productImgUrl').'/'.$data->cate_image;
                    return Html::img($url,['alt'=>'cate_image','width'=>'100','height'=>'100']);
                },
            ],
            //'status',
            //'date_create',
            //'date_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
