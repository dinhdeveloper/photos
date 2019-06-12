<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pro_id',
            'cate_id',
            'pro_name',
            'pro_image',
            [
                'attribute' => 'pro_price',
                'format' => 'decimal',
            ],
            //'price_sale_off',
            //'description',
            //'date_sale_off',
            //'end_sale_off',
            //'pro_slug',
            //'status',
            //'date_create',
            //'date_update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
