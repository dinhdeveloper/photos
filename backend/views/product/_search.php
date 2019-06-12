<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pro_id') ?>

    <?= $form->field($model, 'cate_id') ?>

    <?= $form->field($model, 'pro_name') ?>

    <?= $form->field($model, 'pro_image') ?>

    <?= $form->field($model, 'pro_price') ?>

    <?php // echo $form->field($model, 'price_sale_off') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'date_sale_off') ?>

    <?php // echo $form->field($model, 'end_sale_off') ?>

    <?php // echo $form->field($model, 'pro_slug') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
