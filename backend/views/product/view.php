<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->pro_id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pro_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pro_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pro_id',
            'cate_id',
            'pro_name',
            [
                'attribute'=> 'pro_image',
                'value'=>Yii::getAlias('@productImgUrl').'/'.$model->pro_image,
                'format'=>['image',['width'=>'100','height'=>'100']]
            ],
            [
                'attribute' => 'pro_price',
                'format' => 'decimal',
            ],
            [
                'attribute' => 'price_sale_off',
                'format' => 'decimal',
            ],
            'description',
            'date_sale_off',
            'end_sale_off',
            'pro_slug',
            'status',
            'date_create',
            'date_update',
        ],
    ]) ?>

</div>
