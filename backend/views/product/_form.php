<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'cate_id')->dropDownList(
        $dataCate,
        ['prompt'=>'-Chọn danh mục']
    ) ?>

    <?= $form->field($model, 'pro_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pro_image')->fileInput() ?>

    <?= $form->field($model, 'pro_price')->textInput() ?>

    <?= $form->field($model, 'price_sale_off')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_sale_off')->input('date') ?>

    <?= $form->field($model, 'end_sale_off')->input('date') ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

        <?php ActiveForm::end(); ?>

</div>
